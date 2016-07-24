<?php

/*
 * Guzzle Proxy Configuration by Remote User
 */

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$client->request('POST', 'http://ip.jsontest.com/', [
    'secret' => 'some-really-secret-string'
]);

echo "Request sent\n";
