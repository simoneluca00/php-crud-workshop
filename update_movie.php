<?php

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(401);
    exit;
} 

$id = $_POST['id'];
$title = $_POST['title'];

if (!$title || !$id || !is_numeric($id)) {
    http_response_code(400);
    exit;
}

include __DIR__ . "/includes/open_db_conn.php";

$sql = $conn -> prepare(" UPDATE movies SET title = ? WHERE id = ?");
$sql -> bind_param("si", $title, $id);

$success = $sql -> execute();
$conn -> close();

if ($success) {
    header('Location: index.php');
} else {
    http_response_code(500);
    exit;
}

?>