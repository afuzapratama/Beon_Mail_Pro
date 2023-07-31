<?php

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

function valEmail($email)
{
    global $valid_api;

    $url_api = $valid_api[array_rand($valid_api)];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $client = new Client();
            $request = new Request('GET', $url_api . $email);
            $res = $client->sendAsync($request)->wait();
            $body = $res->getBody();
            $body = json_decode($body);
            $status = strtolower($body->email_status);
            if ($status === "valid") {
                return true;
            } else {
                return false;
            }
        } catch (RequestException $e) {
            return $e->getMessage();
        }
    } else {
        return 'invalid';
    }
}
