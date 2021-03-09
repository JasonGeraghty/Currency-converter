<?php

require_once "./AuthServiceHandler.php";
require_once "./settings.config.php";

//$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);
$page_key = filter_input(INPUT_GET, 'page_key', FILTER_SANITIZE_SPECIAL_CHARS);

/*
  controls the RESTful services
  URL mapping
 */
switch ($page_key) {

    case "register":
        // to handle REST Url /auth/register
        $appRestHandler = new AuthServiceHandler($localhostConnectionConfig);
        $appRestHandler->registerUser();
        break;

    case "validate":
        // to handle REST Url  /auth/validate
        $appRestHandler = new AuthServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->validateToken();
        break;

    case "renew":
        // to handle REST Url  /auth/renew
        $appRestHandler = new AuthServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->renewToken();
        break;

    case "revoke":
        // to handle REST Url  /auth/revoke
        $appRestHandler = new AuthServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->revokeToken();
        break;
        
    case "getId":
        // to handle REST Url  /auth/getId
        $appRestHandler = new AuthServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->getId();
        break;
}

