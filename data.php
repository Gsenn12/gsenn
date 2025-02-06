<?php
require 'db.php';
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = 'secretkey123';

function authenticate() {
    global $secretKey;

    if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
        http_response_code(401);
        echo "Token diperlukan";
        exit;
    }

    $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
    try {
        return JWT::decode($token, new Key($secretKey, 'HS256'))->userId;
    } catch (Exception $e) {
        http_response_code(401);
        echo "Token tidak valid";
        exit;
    }
}

// Simpan Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = authenticate();
    $data = json_encode($_POST['data']);

    $stmt = $pdo->prepare("UPDATE users SET data = :data WHERE id = :id");
    $stmt->execute([':data' => $data, ':id' => $userId]);

    echo "Data berhasil disimpan";
}

// Ambil Data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = authenticate();

    $stmt = $pdo->prepare("SELECT data FROM users WHERE id = :id");
    $stmt->execute([':id' => $userId]);
    $userData = $stmt->fetch();

    echo $userData['data'];
}
?>
