<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once __DIR__ . '/vendor/autoload.php';

$data = json_decode(file_get_contents("php://input"), true);

$data = $data['data'];

$mpdf = new Mpdf\Mpdf();
$mpdf->WriteHTML($data);
$mpdf->Output();