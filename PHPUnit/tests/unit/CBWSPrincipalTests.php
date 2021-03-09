<?php
use PHPUnit\Framework\TestCase;


class CBWSPrincipalTests extends TestCase {
    private $path = 'http://localhost:8888';

    public function testPhpUnit() {
        $this->assertTrue(true);
    }

    /* ##########################################################
                            Test latest  
       ########################################################## */

    public function testPrincipalGetLatestCurrencyIsValidObject() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $result = json_decode($result);

        $this->assertTrue(is_object($result), "Got a " . gettype($result) . " instead of a string");
    }

    public function testPrincipalGetLatestCurrency() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->base == "EUR", "Got a " . $result->base . " instead of a EUR");
    }

    public function testPrincipalGetLatestCurrencyTestBase() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "base" => "USD"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->base == "USD", "Got a " . $result->base . " instead of a USD");
    }

    public function testPrincipalGetLatestCurrencyTestSymbols() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "symbols" => "USD,GBP"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $result = json_decode($result,true);

        $this->assertTrue(array_key_exists('USD',$result['rates']), "Didn't filter all the data");
    }

    public function testPrincipalGetLatestCurrencyTestDataTypeIsJSON() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODE3LCJuYmYiOjE1NTU5MzY4MTcsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.KL-SfNXi5n9NgqDf1hhtJ12HJPii1_aQ10tnFxNCipw';

        $post = [
            "jwt" => $jwt,
            "data_type" => 'JSON'
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $result = json_decode($result);

        $this->assertTrue(is_object($result), "Got a " . gettype($result) . " instead of an object");
    }
    public function testPrincipalGetLatestCurrencyTestDataTypeIsXML() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODE3LCJuYmYiOjE1NTU5MzY4MTcsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.KL-SfNXi5n9NgqDf1hhtJ12HJPii1_aQ10tnFxNCipw';

        $post = [
            "jwt" => $jwt,
            "data_type" => 'XML'
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/latest/', true, $context);

        $this->assertTrue(is_string($result), "Got a " . gettype($result) . " instead of a string");
    }


    /* ##########################################################
                            Test history 
       ########################################################## */

    public function testPrincipalGetHistoryCurrencyIsValidObject() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $result = json_decode($result);

        $this->assertTrue(is_object($result), "Got a " . gettype($result) . " instead of a string");
    }

    public function testPrincipalGetHistoryCurrency() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->base == "EUR", "Got a " . $result->base . " instead of a EUR");
    }

    public function testPrincipalGetHistoryCurrencyTestBase() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "base" => "USD",
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->base == "USD", "Got a " . $result->base . " instead of a USD");
    }

    public function testPrincipalGetHistoryCurrencyTestSymbols() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI';

        $post = [
            "jwt" => $jwt,
            "symbols" => "USD,GBP",
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $result = json_decode($result,true);

        $this->assertTrue(array_key_exists('USD',$result['rates']['2019-01-02']), "Didn't filter all the data");
    }

    public function testPrincipalGetHistoryCurrencyTestDataTypeIsJSON() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODE3LCJuYmYiOjE1NTU5MzY4MTcsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.KL-SfNXi5n9NgqDf1hhtJ12HJPii1_aQ10tnFxNCipw';

        $post = [
            "jwt" => $jwt,
            "data_type" => 'JSON',
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $result = json_decode($result);

        $this->assertTrue(is_object($result), "Got a " . gettype($result) . " instead of an object");
    }
    public function testPrincipalGetHistoryCurrencyTestDataTypeIsXML() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODE3LCJuYmYiOjE1NTU5MzY4MTcsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.KL-SfNXi5n9NgqDf1hhtJ12HJPii1_aQ10tnFxNCipw';

        $post = [
            "jwt" => $jwt,
            "data_type" => 'XML',
            "start_at" => "2019-01-01",
            "end_at" => "2019-01-05"
        ];
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSPrincipalServer/history/', true, $context);

        $this->assertTrue(is_string($result), "Got a " . gettype($result) . " instead of a string");
    }
}