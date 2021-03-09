<?php

require_once("CurrencyServiceHandler.php");
require_once("settings.config.php");

//$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);
$page_key = filter_input(INPUT_GET, 'page_key', FILTER_SANITIZE_SPECIAL_CHARS);

/*
  controls the RESTful services
  URL mapping
 */
switch ($page_key) {

    case "latest":
        // to handle REST Url /latest
        $appRestHandler = new CurrencyServiceHandler($localhostConnectionConfig);
        $appRestHandler->getLatestCurrency();
        break;

    case "history":
        // to handle REST Url  /history
        $appRestHandler = new CurrencyServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->getHistoryCurrency();
        break;

    case "currencies":
        // to handle REST Url  /history
        $appRestHandler = new CurrencyServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->getAllCurrencies();
        break;

    case "logs":
        // to handle REST Url  /history
        $appRestHandler = new CurrencyServiceHandler($localhostConnectionConfig);
        $result = $appRestHandler->getLogsByToken();
        break;
}

