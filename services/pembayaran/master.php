<?php
include("../rest.php");

$requestBody = file_get_contents("php://input");
$url = $target . "/pembayaran/master";

$rest = new Rest($url, $requestBody, "POST");
$response = $rest->execute();

echo $response;
?>
