<?php
// Make sure you get a login prompt if you try to access the service
if (!isset($_SERVER['PHP_AUTH_USER']) and !$_SERVER['PHP_AUTH_USER']) {
    header('WWW-Authenticate: Basic realm="LOGIN REQUIRED"');
    header('HTTP/1.0 401 Unauthorized');
    $status = array('error' => 1, 'message' => 'Access denied 401!');
    echo json_encode($status);
    exit;
}

// Check if you could login. This is of course a very simple check. You probably have a login function to check the user
$accessOk = false;
if ($_SERVER['PHP_AUTH_USER'] == 'John' and $_SERVER['PHP_AUTH_PW'] == 'Doe') {
	$accessOk = true;
}

// If the login fail we prompt the login box again
if (!$accessOk) {
    header('WWW-Authenticate: Basic realm="WRONG PASSWORD"');
    header('HTTP/1.0 401 Unauthorized');
    $status = array('error' => 2, 'message' => 'Wrong username or password!');
    echo json_encode($status);
    exit;
}