<?php

include "./config_auth.php";

function Authentication($post_url){

    $post = [
        'grant_type' => 'client_credentials',
        'client_id' => 'Thc3QFxMKhMSEMAOKw0W5PlpJIyKnuJV',
        'client_secret' => 'kz3Zbi1zIAqADyOS'
    ];
    
    $url = 'https://test.api.amadeus.com/v1/security/oauth2/token';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = curl_exec($ch);
    
    $body = json_decode($response);
    
    $token=$body->access_token;
    
    //setup the request, you can also use CURLOPT_URL
    $ch = curl_init($post_url);
    
    // Returns the data/output as a string instead of raw data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    //Set your auth headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Authorization: Bearer ' . $token
       ));
    
    // get stringified data/output. See CURLOPT_RETURNTRANSFER
    $data = curl_exec($ch);

    return $data;
}