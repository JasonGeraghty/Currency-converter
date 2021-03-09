<?php

require_once "../db/DBController.php";
require_once "../authentication/constants.php";

include_once '../libs/BeforeValidException.php';
include_once '../libs/ExpiredException.php';
include_once '../libs/SignatureInvalidException.php';
include_once '../libs/JWT.php';
use \Firebase\JWT\JWT;

/*
 * A domain class to demonstrate RESTful web services
 */

Class AuthService {

    public function register(array $dbConnectionConfig) {

        //used when we specify contentType as 'application/json'
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);
        
        //access each field
        $fname = $json_obj['fname'];
        $lname = $json_obj['lname'];
        $email = $json_obj['email'];   
        if ($fname == '') {
            return array(
                'success' => 0,
                'message' => 'Firstname cannot be empty'
            );
        }
        if ($lname == '') {
            return array(
                'success' => 0,
                'message' => 'Lastname cannot be empty'
            );
        }
        if ($email == '') {
            return array(
                'success' => 0,
                'message' => 'Email cannot be empty'
            );
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return array(
                'success' => 0,
                'message' => 'Must be valid email address'
            );
        }
        
        //if all set then create token
        if (isset($fname) && isset($lname) && isset($email)) {
            date_default_timezone_set('Europe/Dublin');
            $key = "this is a very long secret key for encrypting tokens";
            $iss = "http://cbws-auth.com/tokens";
            $aud = "http://cbws-math.com";
            $iat = time() - 1000;
            $nbf = $iat + 1000;
            
         
            //form the token for encoding
            $token = array(
                "iss" => $iss, //issuer
                "aud" => $aud, //audience
                "iat" => $iat, //issued at time
                "nbf" => $nbf, //not to be used before
                "data" => array(
                    "firstname" => $fname,
                    "lastname" => $lname,
                    "email" => $email
                )
            );
            
            $jwt = JWT::encode($token, $key);

            //set expiry
            $expiryDate = strtotime("+12 months", time());
            // set date
            $date = date("Y-m-d");

            //update database - we need to make the DB!
            $dbcontroller = new DBController($dbConnectionConfig);
            $stmt = $dbcontroller->dbc->prepare("insert into tbl_user_tokens (fname, lname, email, token, expiredate,currentdate) values (?,?,?,?,?,?)");
            $result = $stmt->execute(array($fname, $lname, $email, $jwt, $expiryDate,$date));

            //set this to 1 as we haven't yet created the DB
            $result = 1;
            
            //set expiry
            $expiryDate = strtotime("+12 months", time());
              
            if ($result != 0) {
                return array(
                    "success" => 1,
                    "message" => "Successful registration.",
                    "email" => $email,
                    "expiryDate" => $expiryDate,
                    "jwt" => $jwt);
            }
        }
        
    }

    public function validate(array $dbConnectionConfig) {
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $jwt = $json_obj['jwt'];  
        
        
        if (isset($jwt) && $jwt != null && $jwt != '') {
            // check database for token
            $dbcontroller = new DBController($dbConnectionConfig);

            $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
            $stmt->execute(array($jwt));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($result);
            $date = $result[0]['expiredate'];

            if (isset($result)) {
                if ($result[0]['currentdate'] != date("Y-m-d")) {
                    $stmt2 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET currentdate = ?, dayrequests = 0 where token = (?)");
                    $stmt2->execute(array(date("Y-m-d"),$jwt));

                    $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
                    $stmt->execute(array($jwt));

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
    
                $stmt3 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET dayrequests = dayrequests + 1, totalrequests = totalrequests + 1 where token = (?)");
                $stmt3->execute(array($jwt));
                if ($result[0]['totalrequests'] >= TOTAL_REQUESTS ) {
                    return  json_encode(array(
                            "success" => 0,
                            "message" => "Total number of requests exceeded."));
                } elseif ($result[0]['dayrequests'] >= DAILY_REQUESTS) {
                    return  json_encode(array(
                        "success" => 0,
                        "message" => "Total number of requests per day exceeded."));
                } elseif ($result[0]['token'] !== $jwt) {
                    return  json_encode(array(
                        "success" => 0,
                        "message" => "Token is invalid."));
                } elseif (gmdate('Y-m-d', $date) < date("Y-m-d")) {
                    return  json_encode(array(
                        "success" => 0,
                        "message" => "Token has expired."));
                } else {
                
                    if ($json != '[]') {
                        return json_encode(array(
                            "success" => 1,
                            "message" => "Token is valid.",
                            "jwt" => $jwt));
                    }
                }
            }
        }
    }

    public function renew(array $dbConnectionConfig) {
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $jwt = $json_obj['jwt'];  
        
        

        if (isset($jwt) && $jwt != null && $jwt != '') {
            // check database for token
            $dbcontroller = new DBController($dbConnectionConfig);
            // Check if token is valid
            $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
            $stmt->execute(array($jwt));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $date = $result[0]['expiredate'];

            if (isset($result) ) {
                if ($result[0]['currentdate'] != date("Y-m-d")) {
                    $stmt2 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET currentdate = ?, dayrequests = 0 where token = (?)");
                    $stmt2->execute(array(date("Y-m-d"),$jwt));

                    $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
                    $stmt->execute(array($jwt));

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
    
                $stmt3 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET dayrequests = dayrequests + 1, totalrequests = totalrequests + 1 where token = (?)");
                $stmt3->execute(array($jwt));
                if ($result[0]['totalrequests'] >= TOTAL_REQUESTS) {
                    return  array(
                            "success" => 0,
                            "message" => "Total number of requests exceeded.");
                } elseif ($result[0]['dayrequests'] >= DAILY_REQUESTS) {
                    return  array(
                        "success" => 0,
                        "message" => "Total number of requests per day exceeded.");
                } elseif ($result[0]['token'] !== $jwt) {
                    return  array(
                        "success" => 0,
                        "message" => "Token is invalid.");
                } elseif (gmdate('Y-m-d', $date) < date("Y-m-d") && gmdate('Y-m-d', $date) != '1970-01-01') {
                    return  array(
                        "success" => 0,
                        "message" => "Token has expired.");
                } else {

                    $json = json_encode($result);

                    date_default_timezone_set('Europe/Dublin');
                    $key = "this is a very long secret key for encrypting tokens";
                    $iss = "http://cbws-auth.com/tokens";
                    $aud = "http://cbws-math.com";
                    $iat = time() - 1000;
                    $nbf = $iat + 1000;
                    
                
                    //form the token for encoding
                    $newtoken = array(
                        "iss" => $iss, //issuer
                        "aud" => $aud, //audience
                        "iat" => $iat, //issued at time
                        "nbf" => $nbf, //not to be used before
                        "data" => array(
                            "firstname" => $result[0]['fname'],
                            "lastname" => $result[0]['lname'],
                            "email" => $result[0]['email']
                        )
                    );
                    
                    $newjwt = JWT::encode($newtoken, $key);

                    if ($json != '[]') {
                        $stmt2 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET token = ? where token = (?)");
                        $stmt2->execute(array($newjwt, $jwt));

                        $rowCount = $stmt2->rowCount();

                        if ($rowCount === 1) {
                            return array(
                                "success" => 1,
                                "message" => "Token has been renewed.",
                                "newjwt" => $newjwt);
                        }
                    }
                }
            }
        }
    }

    public function revoke(array $dbConnectionConfig) {
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $jwt = $json_obj['jwt'];  
        
        

        if (isset($jwt) && $jwt != null && $jwt != '') {
            // check database for token
            $dbcontroller = new DBController($dbConnectionConfig);
            // Check if token is valid
            $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
            $stmt->execute(array($jwt));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($result);
            $date = $result[0]['expiredate'];

            if (isset($result)) {
                if ($result[0]['currentdate'] != date("Y-m-d")) {
                    $stmt2 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET currentdate = ?, dayrequests = 0 where token = (?)");
                    $stmt2->execute(array(date("Y-m-d"),$jwt));

                    $stmt = $dbcontroller->dbc->prepare("select * from tbl_user_tokens where token = (?)");
                    $stmt->execute(array($jwt));

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
    
                $stmt3 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET dayrequests = dayrequests + 1, totalrequests = totalrequests + 1 where token = (?)");
                $stmt3->execute(array($jwt));
                if ($result['totalrequests'] >= 100 ) {
                    return  array(
                            "success" => 0,
                            "message" => "Total number of requests exceeded.");
                } elseif ($result['dayrequests'] >= 5) {
                    return  array(
                        "success" => 0,
                        "message" => "Total number of requests per day exceeded.");
                } elseif (gmdate('Y-m-d', $date) < date("Y-m-d")) {
                    return  array(
                        "success" => 0,
                        "message" => "Token has expired.");
                } else {

                    if ($json != '[]' && $json != null && $json != '') {
                        $newjwt = '';
                        $stmt2 = $dbcontroller->dbc->prepare("UPDATE tbl_user_tokens SET token = ? where token = (?)");
                        $stmt2->execute(array($newjwt, $jwt));

                        $rowCount = $stmt2->rowCount();

                        if ($rowCount === 1) {
                            return array(
                                "success" => 1,
                                "message" => "Token has been revoked.",
                                "newjwt" => $newjwt);
                        }
                    }
                }
            }
        }
    }

    public function getId(array $dbConnectionConfig) {
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $jwt = $json_obj['jwt'];  
        // check database for token
        $dbcontroller = new DBController($dbConnectionConfig);
        // Check if token is valid
        $stmt = $dbcontroller->dbc->prepare("select id from tbl_user_tokens where token = (?)");
        $stmt->execute(array($jwt));

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return array(
                "id" => "invalid"
            );
        }

        return $result[0];

    }
}