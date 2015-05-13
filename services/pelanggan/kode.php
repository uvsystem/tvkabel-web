<?php
include("../rest.php");

$requestBody = file_get_contents("php://input");

$obj = json_decode($requestBody);
$url = $target . "/pelanggan/perusahaan/" . $obj->idPerusahaan . "/kode/" . $obj->kode;

$rest = new Rest($url, null, "GET");
$response = $rest->execute();

echo $response;
?>
