<?php

$movie_id = $_GET['id'];

if (!$movie_id || !is_numeric($movie_id)) {
    http_response_code(400);
    echo "INVALID ID";
    exit;
}

include __DIR__ . "/includes/open_db_conn.php";

$sql = $conn -> prepare(" SELECT * FROM movies WHERE id = ? ");
$sql -> bind_param('i' , $movie_id);
$success = $sql -> execute();
$result = $sql -> get_result();

$movie = $result -> fetch_assoc();

if (!$movie) {
    http_response_code(400);
    echo "Nessun film corrispondente all'ID fornito.";
    exit;
}

$conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
        include_once __DIR__ . "/includes/header.php";
    ?>

    <title>EDIT MOVIE</title>
</head>
<body>

    <div class="container py-5">
        <h1 class="mb-5">Edit Movie</h1>

        <form action="update_movie.php" method="POST">
            <input type="hidden" name="id" value="<?= $movie['id']; ?>">
            <input type="text" name="title" value="<?= $movie['title']; ?>">
            <button type="submit" class="btn btn-sm btn-primary">Modifica</button>
        </form>
    </div>

    <?php 
        include_once __DIR__ . "/includes/footer.php";
    ?>
    
</body>
</html>