<?php

require_once("../rest/SimpleRest.php");
require_once("CurrencyService.php");
require_once("../db/DBController.php");
require_once("constants.php");

class CurrencyServiceHandler extends SimpleRest {

    private $dbConnectionConfig;

    public function __construct(array $dbConnectionConfig) {
        $this->dbConnectionConfig = $dbConnectionConfig;
    }

    function getLatestCurrency() {
        $curr = new currencyService();
        $rawData = $curr->getLatestCurrency($this->dbConnectionConfig);
        
        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }
        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $dbcontroller = new DBController($this->dbConnectionConfig);
        $jwt = $json_obj['jwt'];
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
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/getId/', true, $context);
        $result = json_decode($result);
        $userId = $result->id;
        
        $requestFormat = strtoupper($json_obj['data_type']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $requestType = 'getLatestCurrency';
        $stmt = $dbcontroller->dbc->prepare("INSERT INTO logs (`user_id`,`request_type`,`request_format`,`status_code`,`ip_address`) VALUES (?,?,?,?,?)");
        $result = $stmt->execute(array($userId,$requestType,$requestFormat,$statusCode,$ip));

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function getHistoryCurrency() {
        $curr = new currencyService();
        $rawData = $curr->getHistoryCurrency($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $dbcontroller = new DBController($this->dbConnectionConfig);
        $jwt = $json_obj['jwt'];
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
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/getId/', true, $context);
        $result = json_decode($result);
        $userId = $result->id;
        
        $requestFormat = strtoupper($json_obj['data_type']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $requestType = 'getHistoryCurrency';
        $stmt = $dbcontroller->dbc->prepare("INSERT INTO logs (`user_id`,`request_type`,`request_format`,`status_code`,`ip_address`) VALUES (?,?,?,?,?)");
        $result = $stmt->execute(array($userId,$requestType,$requestFormat,$statusCode,$ip));
        
        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function getAllCurrencies() {
        $curr = new currencyService();
        $rawData = $curr->getAllCurrenciesByPopularity($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $dbcontroller = new DBController($this->dbConnectionConfig);
        $jwt = $json_obj['jwt'];
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
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/getId/', true, $context);
        $result = json_decode($result);
        $userId = $result->id;
        
        $requestFormat = strtoupper($json_obj['data_type']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $requestType = 'getAllCurrencies';
        $stmt = $dbcontroller->dbc->prepare("INSERT INTO logs (`user_id`,`request_type`,`request_format`,`status_code`,`ip_address`) VALUES (?,?,?,?,?)");
        $result = $stmt->execute(array($userId,$requestType,$requestFormat,$statusCode,$ip));
        
        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function getLogsByToken() {
        $curr = new currencyService();
        $rawData = $curr->getLogsByToken($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //access JSON input blob
        $json_str = file_get_contents('php://input');

        //decode as an associative array
        $json_obj = json_decode($json_str, true);

        $dbcontroller = new DBController($this->dbConnectionConfig);
        $jwt = $json_obj['jwt'];
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
        $result = file_get_contents(AUTH_URL . 'CBWSAuthServer/auth/getId/', true, $context);
        $result = json_decode($result);
        $userId = $result->id;
        
        $requestFormat = 'JSON';

        $ip = $_SERVER['REMOTE_ADDR'];
        $requestType = 'getLogsByToken';
        $stmt = $dbcontroller->dbc->prepare("INSERT INTO logs (`user_id`,`request_type`,`request_format`,`status_code`,`ip_address`) VALUES (?,?,?,?,?)");
        $result = $stmt->execute(array($userId,$requestType,$requestFormat,$statusCode,$ip));
        
        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    // Method acquired from https://stackoverflow.com/questions/6041741/fastest-way-to-check-if-a-string-is-json-in-php
    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
