<?php

// se l'utente arriva a questa pagina tramite un metodo che non sia POST (quindi se non compila il form)
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    // die("NO");
    http_response_code(401);
    exit;
} 

$title = $_POST['title'];

if (!$title) {
    echo "Inserire un titolo";
    exit;
}

include __DIR__ . "/includes/open_db_conn.php";

// il valore inserito viene "sanificato" con queste due funzioni
$sql = $conn -> prepare(" INSERT INTO movies (title) VALUES (?) ");
$sql -> bind_param('s' , $title);
$success = $sql -> execute();

$conn -> close();

if ($success) {
    header('Location: index.php');
} else {
    http_response_code(500);
    exit;
}

?>

