<?php

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    // die("NO");
    http_response_code(401);
    exit;
} 

$id = $_POST['id'];

if (!$id || !is_numeric($id)) {
    http_response_code(400);
}

include __DIR__ . "/includes/open_db_conn.php";

$sql = $conn -> prepare(" DELETE FROM movies WHERE id = ? ");
$sql -> bind_param("i", $id);

$success = $sql -> execute();
$conn -> close();

if ($success) {
    header('Location: index.php');
} else {
    http_response_code(500);
    exit;
}

?>