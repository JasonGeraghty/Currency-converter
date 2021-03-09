<?php

require_once("../db/DBController.php");
require_once("./constants.php");

Class CurrencyService {

    public function getLatestCurrency(array $dbConnectionConfig) {

        //used when we specify contentType as 'application/json'
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);
        
        // URL of 3rd party API
        $url = 'https://api.exchangeratesapi.io/';
        // path at end of URL
        $path = 'latest';
        // parameters to be added
        $params = '';

        //access each field
        $jwt = $json_obj['jwt'];
        $base = $json_obj['base'];
        $symbols = $json_obj['symbols'];
        $startat = $json_obj['start_at'];   
        $endat = $json_obj['end_at'];  
        $contenttype = $json_obj['data_type'];
        
        $dbcontroller = new DBController($dbConnectionConfig);

        $post = ["jwt" => $jwt];
        $post = json_encode($post);

        $options = array(
            'http' => array(
            'method' => 'POST',
            'header'           => "Content-type: application/json\r\n".
                              "Accept: application/xml, application/json\r\n" .
                              "Connection: close\r\n" .
                              "Content-length: " . strlen($post) . "\r\n",
            'content' => $post
        )
        );
        $context = stream_context_create($options);
        // Authenticate JWT from auth server
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/validate/', true, $context);

        $result = json_decode($result);
        $result = json_decode($result->output);

        if ($result->success == 0) {
            return $result;
        }

        // check if requestiong current currency or previous currency
        if (isset($startat) && isset($endat)) {
            $path = "history?start_at=$startat&end_at=$endat";

            $stmt1 = $dbcontroller->dbc->prepare("INSERT INTO dates (date_start,date_end)VALUES (?,?)");
            $stmt1->execute(array($startat,$endat));
            // check what params need to be added, if any
            if (isset($base) && isset($symbols)) {
                $params .= "&base=$base&symbols=$symbols";
                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $result = $stmt->execute(array($base));
            } elseif (isset($base)){
                $params .= "&base=$base";

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $stmt->execute(array($base));
            } elseif (isset($symbols)) {
                $params .= "&symbols=$symbols";

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = 'EUR'");
                $stmt->execute();
            } else {
                $params = '';

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = 'EUR'");
                $stmt->execute();
            }
        } else {
            // check what params need to be added, if any
            if (isset($base) && isset($symbols)) {
                $params .= "?base=$base&symbols=$symbols";
                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $result = $stmt->execute(array($base));
            } elseif (isset($base)){
                $params .= "?base=$base";

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $stmt->execute(array($base));
            } elseif (isset($symbols)) {
                $params .= "?symbols=$symbols";
            } else {
                $params = '';
            }
        }
        
        $fullurl = $url . $path . $params;

        $options = array(
            'http' => array(
            'method' => 'GET'
        )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($fullurl, true, $context);

        if ($contenttype == 'xml') {
            $result = json_decode($result);
            return self::array2xml($result,false);
        } else {
            return json_decode($result);
        }
    }

    public function getHistoryCurrency(array $dbConnectionConfig) {
        //used when we specify contentType as 'application/json'
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);
        
        // URL of 3rd party API
        $url = 'https://api.exchangeratesapi.io/';

        // parameters to be added
        $params = '';

        //access each field
        $jwt = $json_obj['jwt'];
        $base = $json_obj['base'];
        $symbols = $json_obj['symbols'];
        $startat = $json_obj['start_at'];   
        $endat = $json_obj['end_at'];  
        $contenttype = $json_obj['data_type'];

        $dbcontroller = new DBController($dbConnectionConfig);

        $post = ["jwt" => $jwt];
    
        $post = json_encode($post);

        $options = array(
            'http' => array(
            'method' => 'POST',
            'header'           => "Content-type: application/json\r\n".
                              "Accept: application/json\r\n" .
                              "Connection: close\r\n" .
                              "Content-length: " . strlen($post) . "\r\n",
            'content' => $post
        )
        );
        $context = stream_context_create($options);
        // Authenticate JWT from auth server
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/validate/', true, $context);

        $result = json_decode($result);
        $result = json_decode($result->output);

        if ($result->success == 0) {
            return $result;
        }
        if (isset($startat) && isset($endat)) {
            $path = "history?start_at=$startat&end_at=$endat";

            $stmt1 = $dbcontroller->dbc->prepare("INSERT INTO dates (date_start,date_end)VALUES (?,?)");
            $stmt1->execute(array($startat,$endat));
            // check what params need to be added, if any
            if (isset($base) && isset($symbols)) {
                $params .= "&base=$base&symbols=$symbols";
                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $result = $stmt->execute(array($base));
            } elseif (isset($base)){
                $params .= "&base=$base";

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = (?)");
                $stmt->execute(array($base));
            } elseif (isset($symbols)) {
                $params .= "&symbols=$symbols";

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = 'EUR'");
                $stmt->execute();
            } else {
                $params = '';

                $stmt = $dbcontroller->dbc->prepare("UPDATE currencies SET quantity = quantity + 1 where currency = 'EUR'");
                $stmt->execute();
            }

            $fullurl = $url . $path . $params;

            $options = array(
                'http' => array(
                'method' => 'GET'
            )
            );

            $context = stream_context_create($options);
            $result = file_get_contents($fullurl, true, $context);

            if ($contenttype == 'xml') {
                $result = json_decode($result);
                return self::array2xml($result,false);
            } else {
                return json_decode($result);
            }
        } else {
            return  array(
                "success" => 0,
                "message" => "No start_at or end_at values entered.");
        }
    }
    // Method obtained and altered from https://stackoverflow.com/questions/26964136/how-do-i-convert-json-to-xml
    function array2xml($array, $xml = false){

        if($xml === false){
            $xml = new SimpleXMLElement('<currencies/>');
        }
    
        foreach($array as $key => $value){
            if(is_object($value)){
                $this->array2xml($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, $value);
            }
        }
    
        return $xml->asXml();
    }

    public function getAllCurrenciesByPopularity(array $dbConnectionConfig) {
        $dbcontroller = new DBController($dbConnectionConfig);

        $stmt = $dbcontroller->dbc->prepare("SELECT * FROM currencies ORDER BY quantity DESC");
        $stmt->execute(array($jwt));

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getLogsByToken(array $dbConnectionConfig) {

        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $jwt = $json_obj['jwt'];
        $request_type = $json_obj['request_type'];
        $request_format = $json_obj['request_format'];
        $status_code = $json_obj['status_code'];

        $post = [
            "jwt" => $jwt
        ];
    
        $post = json_encode($post);

        $dbcontroller2 = new DBController($dbConnectionConfig);
        $options = array(
            'http' => array(
            'method' => 'POST',
            'header'           => "Content-type: application/json\r\n".
                              "Accept: application/json\r\n" .
                              "Connection: close\r\n" .
                              "Content-length: " . strlen($post) . "\r\n",
            'content' => $post
        )
        );
        $context = stream_context_create($options);
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/getId/', true, $context);
        $result = json_decode($result);
        $userId = $result->id;
        if ($request_type != '' && $request_format != '' & $status_code != '') {

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `request_type` = (?) AND `request_format` = (?) AND `status_code` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$request_type,$request_format,$status_code));

        } else if ($request_type != '' && $request_format != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `request_type` = (?) AND `request_format` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$request_type,$request_format));

        } else if ($status_code != '' && $request_format != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `status_code` = (?) AND `request_format` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$status_code,$request_format));

        } else if ($status_code != '' && $request_type != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `status_code` = (?) AND `request_type` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$status_code,$request_type));

        } else if ($status_code != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `status_code` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$status_code));

        } else if ($request_type != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `request_type` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$request_type));

        } else if ($request_format != ''){

            $query = "SELECT * FROM logs WHERE `user_id` = (?) AND `request_format` = (?)";
            $stmt = $dbcontroller2->dbc->prepare($query);
            $stmt->execute(array($userId,$request_format));

        } else {

            $stmt = $dbcontroller2->dbc->prepare("SELECT * FROM logs WHERE `user_id` = (?)");
            $stmt->execute(array($userId));

        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
