<?php

include "./config/curl_auth.php";

$data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=NYC&destination=MAD&departureDate=2019-08-01&max=2");

print_r($data);