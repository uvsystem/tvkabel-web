<?php
include("../rest.php");

$requestBody = file_get_contents("php://input");
//decode json into stdObject
$obj = json_decode($requestBody);
$url = $target . "/pelanggan/" . $obj->id . "/location/" . $obj->latitude . "/" . $obj->longitude;

$rest = new Rest($url, null, "PUT");
$response = $rest->execute();

echo $response;
?>
