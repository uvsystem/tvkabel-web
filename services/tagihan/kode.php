<?php
include("../rest.php");

$requestBody = file_get_contents("php://input");
$obj = json_decode($requestBody);
$url = $target . "/pembayaran/perusahaan/" . $obj->idPerusahaan . "/pelanggan/kode/" . $obj->kode . "/payable";

$rest = new Rest($url, null, "GET");
$response = $rest->execute();

echo $response;
?>
