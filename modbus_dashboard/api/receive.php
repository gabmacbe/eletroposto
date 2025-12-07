<?php
header("Content-Type: application/json; charset=utf-8");

$save_file = __DIR__ . "/../data/latest.json";

if (!file_exists(__DIR__ . "/../data")) {
    mkdir(__DIR__ . "/../data", 0755, true);
}

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if ($data === null) {
    http_response_code(400);
    echo json_encode(["error" => "JSON inválido"]);
    exit;
}

file_put_contents($save_file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(["status" => "ok"]);
?>