<?php
    require_once './constants.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='./main.css'>
    <title>Currency Converter</title>
</head>
<body>
    <?php
    if(!isset($_COOKIE['jwt']) || $_COOKIE['jwt'] == '') {
        header('location:index.php');
        exit();
    }
    $options = array(
        'http' => array(
        'method' => 'GET',
        'header' => "Content-type: application/json\r\n".
                    "Accept: application/xml, application/json\r\n" .
                    "Connection: close\r\n" .
                    "Content-length: " . strlen($post) . "\r\n",
    )
    );
    $url = PRINCIPAL_URL . 'currencies/';
    $context = stream_context_create($options);
    $result = file_get_contents($url, true, $context);
    $result = json_decode($result);
    ?>

    <h1>Currency converter</h1>
    <button id='renew'>Renew token</button>
    <button id='revoke'>Revoke token</button>
    <form id='currencyForm'>
    <label for="currency">Select currency to be used as a baseline</label>
    <select name="currency" id="">
    <?php
    foreach($result as $option) {
        echo "<option value='$option->currency'>$option->currency</option>";
    }
    ?>
    </select>
    <label for="symbols">Search for specific currency abbreviation seperated by comma . e.g. EUR,GBP,USD</label>
    <input type="text" name='symbols'>
    <label for="data_type">Select format of data</label>JSON
    <input type="radio" name='data_type' value='json' id='radio1' checked>
    XML
    <input type="radio" name='data_type' value='xml' id='radio2'>
    <label for="date_start">Starting date of search</label>
    <input type="date" min='<?=date('Y-m-d', strtotime('-1 month'))?>' max='<?=date('Y-m-d', strtotime('-1 day'))?>' name='date_start'>
    <label for="date_end">Ending date of search</label>
    <input type="date" max='<?=date('Y-m-d')?>' name='date_end'>
    <button type="submit">Submit</button>
    </form>
    <div>
        <h2>Output:</h2>
        <p id='target'>
        </p>
    </div>
    <script src='./main.js'></script>
</body>
</html>