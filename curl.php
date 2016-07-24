<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "ip.jsontest.com");

// curl_setopt($ch, CURLOPT_PROXY, getenv("HTTP_PROXY"));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

if(curl_error($ch)) {
    echo 'error:' . curl_error($ch);
}

var_dump($output);

curl_close($ch);
