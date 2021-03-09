<?php

require_once "../rest/SimpleRest.php";
require_once "./AuthService.php";

class AuthServiceHandler extends SimpleRest {

    private $dbConnectionConfig;

    public function __construct(array $dbConnectionConfig) {
        $this->dbConnectionConfig = $dbConnectionConfig;
    }

    function registerUser() {
        $auth = new AuthService();
        $rawData = $auth->register($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function validateToken() {
        $auth = new AuthService();
        $rawData = $auth->validate($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result["output"] = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function renewToken() {
        $auth = new AuthService();
        $rawData = $auth->renew($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result["output"] = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function revokeToken() {
        $auth = new AuthService();
        $rawData = $auth->revoke($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result["output"] = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

    function getId() {
        $auth = new AuthService();
        $rawData = $auth->getId($this->dbConnectionConfig);

        //set status for response
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('success' => 0);
        } else {
            $statusCode = 200;
        }

        //add header
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $result = $rawData;

        //add response payload (i.e. content)
        $this->setResponseContent($requestContentType, $result);
    }

   

}
