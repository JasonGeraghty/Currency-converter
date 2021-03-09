<?php
use PHPUnit\Framework\TestCase;

require_once '../../../CBWSAuthServer/authentication/AuthService.php';

// to run:
// php /Applications/Mamp/htdocs/CBWSCA2/PHPUnit/vendor/bin/phpunit CBWSAuthTests.php
class CBWSAuthTests extends TestCase {

    private $path = 'http://localhost:8888';

    public function testPhpUnit() {
        $this->assertTrue(true);
    }

    public function testAuthValidateReturnsObject() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYzMjc1LCJuYmYiOjE1NTU4NjQyNzUsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJEMDAxODY3MjZAc3R1ZGVudC5ka2l0LmllIn19.trdH3zdl4to_xStTvjpAlGv3f_Cg2d7-GAV5mHnMwfk';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/validate/', true, $context);

        $result = json_decode($result);
        $result = json_decode($result->output);

        $this->assertTrue(is_object($result), "Got a " . gettype($result) . " instead of a string");
    }

    public function testAuthValidateSucceeds() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYwOTg5LCJuYmYiOjE1NTU4NjE5ODksImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.4EBQfXDAyQc4On8zAS7APmQ4OqEqZO92PovQa2BHQWY';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/validate/', true, $context);

        $result = json_decode($result);
        $result = json_decode($result->output);

        $this->assertTrue($result->success == 1, "Value was " . $result->success . " instead of 1, $result->message");
    }

    public function testAuthValidateFails() {
        $jwt = 'df';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/validate/', true, $context);

        $result = json_decode($result);
        $result = json_decode($result->output);

        $this->assertTrue($result->success == 0, "Value was " . $result->success . " instead of 0");
    }

    public function testAuthRenewSucceeds() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYwOTg5LCJuYmYiOjE1NTU4NjE5ODksImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.4EBQfXDAyQc4On8zAS7APmQ4OqEqZO92PovQa2BHQWY';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/renew/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->output->success == 1, "Value was " . json_decode($result->output->success) . " instead of 1, " . $result->output->message . ", this test will only succeed the first time as token will change.");
    }

    public function testAuthRenewFails() {
        $jwt = 'sodnvcoiw';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/renew/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->output->success == 0, "Value was " . json_decode($result->output->success) . " instead of 0, " . $result->output->message);
    }

    public function testAuthRegisterSucceeds() {
        $post = [
            'fname' => 'unittest',
            'lname' => 'unitest',
            'email' => 'unittest@gmail.com'
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/register/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->success == 1, "Value was " . $result->success . " instead of 0, ");
    }
    public function testAuthRegisterFails() {
        $post = [
            'fname' => '',
            'lname' => 'unitest',
            'email' => 'unittest@gmail.com'
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/register/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->success == 0, "Value was " . $result->success . " instead of 0, ");
    }

    public function testAuthGetIdsSucceed() {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM2MzQzLCJuYmYiOjE1NTU5MzczNDMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.gSYsKtOwWc3LR0Rq243JSSLSA2YrIH_1qxfeyE-XvN8';

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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/getId/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->id == 56, "Value was " . $result->id . " instead of 56");
    }

    public function testAuthGetIdsFail() {
        $jwt = 'wvomwvim';
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
        $result = file_get_contents($this->path . '/CBWSCA2/CBWSAuthServer/auth/getId/', true, $context);

        $result = json_decode($result);

        $this->assertTrue($result->id == 'invalid', "Value was " . $result->id . " instead of invalid");
    }
}