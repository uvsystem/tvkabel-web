<?php
include("../rest.php");

$requestBody = file_get_contents("php://input");

$obj = json_decode($requestBody);
$url = $target . "/pembayaran/pelanggan/id/" . $obj->id . "/payable";

$rest = new Rest($url, null, "GET");
$response = $rest->execute();

echo $response;
?>
