<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "./config/curl_auth.php";

$origin = $_GET['origin'];
$destination = $_GET['destination'];
$departureDate = $_GET['departureDate'];
$returnDate = $_GET['returnDate'];
$arrivalBy = $_GET['arrivalBy'];
$returnBy = $_GET['returnBy'];
$maxPrice = $_GET['maxPrice'];

$empty_origin = empty($origin);
$destination_ety = empty($destination);
$departureDate_ety = empty($departureDate);
$returnDate_ety = empty($returnDate);
$arrivalBy_ety = empty($arrivalBy);
$returnBy_ety = empty($returnBy);
$maxPrice_ety = empty ($maxPrice);


if ($empty_origin == 1 && $destination_ety == 1 && $departureDate_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "origin"
                )
            ),
            1 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "destination"
                )
            ),
            2 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "departureDate"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($empty_origin == 1 && $destination_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "origin"
                )
            ),
            1 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "destination"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($empty_origin == 1 && $departureDate_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "origin"
                )
            ),
            1 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "departureDate"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($destination_ety == 1 && $departureDate_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "destination"
                )
            ),
            1 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "departureDate"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($origin_empty == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "Origin"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($destination_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "destination"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
} else if ($departureDate_ety == 1) {
    $arr = array(
        "errors" => array(
            0 =>
            array(
                "status" => "400",
                "code" => "32171",
                "title" => "MANDATORY DATA MISSING",
                "detail" => "This field must be filled.",
                "source" => array(
                    "parameter" => "departureDate"
                )
            )
        )
    );
    http_response_code(400);
    $errors = json_encode($arr);
    echo $errors;
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 1 && $returnBy_ety == 1 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 1 && $returnBy_ety == 1 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 1 && $returnBy_ety == 0 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnBy=$returnBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 1 && $returnBy_ety == 0 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnBy=$returnBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 0 && $returnBy_ety == 1 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&arrivalBy=$arrivalBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 0 && $returnBy_ety == 1 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&arrivalBy=$arrivalBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 0 && $returnBy_ety == 0 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&arrivalBy=$arrivalBy&returnBy=$returnBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 1 && $arrivalBy_ety == 0 && $returnBy_ety == 0 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&arrivalBy=$arrivalBy&returnBy=$returnBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 1 && $returnBy_ety == 1 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnBy=$returnBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 1 && $returnBy_ety == 1 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 1 && $returnBy_ety == 0 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&returnBy=$returnBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 1 && $returnBy_ety == 0 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&returnBy=$returnBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 0 && $returnBy_ety == 1 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&arrivalBy=$arrivalBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 0 && $returnBy_ety == 1 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&arrivalBy=$arrivalBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 0 && $returnBy_ety == 0 && $maxPrice_ety == 1){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&arrivalBy=$arrivalBy&returnBy=$returnBy");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}

if($origin_empty == 0 && $destination_ety == 0 && $departureDate_ety == 0 && $returnDate_ety == 0 && $arrivalBy_ety == 0 && $returnBy_ety == 0 && $maxPrice_ety == 0){
    $data = Authentication("https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$origin&destination=$destination&departureDate=$departureDate&returnDate=$returnDate&arrivalBy=$arrivalBy&returnBy=$returnBy&maxPrice=$maxPrice");
    print_r($data);

    $status = json_decode($data);
    if($status->errors){
        http_response_code($status->errors[0]->status);
    }
}