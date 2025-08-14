<?php
session_start();
require 'db.php';
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $pdo->prepare("INSERT INTO tasks (title, user_id) VALUES (?, ?)");
    $stmt->execute([$data['title'], $_SESSION['user_id']]);
    echo json_encode(["status" => "success"]);
}

if ($method === 'DELETE') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $_SESSION['user_id']]);
        echo json_encode(["status" => "deleted"]);
    }
}
