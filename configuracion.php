<?php
    require_once 'vendor/autoload.php';
    

    $clientID = '937291392613-80aersam1sajba116fopkd3c0pq4u6mv.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost:8080/index.php';

    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

?>