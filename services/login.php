<?php
include("rest.php");

$requestBody = file_get_contents('php://input');
$url = $target . "/login";

$rest = new Rest($url, $requestBody, "POST");
$response = $rest->execute();

echo $response;
?>
