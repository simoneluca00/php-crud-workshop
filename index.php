<?php

include __DIR__ . "/includes/open_db_conn.php";

$query = "SELECT `id`, `title` FROM `movies` ORDER BY `id`";
$result = $conn -> query($query);

if (!$result) {
    echo "Si è verificato un errore";
    exit();
}

$movies = [];

if ($result && $result -> num_rows > 0) {
    while ( $movie = $result -> fetch_assoc() ) {
        $movies[] = $movie;
    }
}

// var_dump($movies);

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
    <title>Movies</title>
</head>

<body>

    <div class="container py-5">

        <header class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">MOVIES</h1>
            <a href="add_movie.php" class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i>
                Aggiungi Film
            </a>
        </header>
        
        <table class="table">
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>ACTIONS</th>
            </tr>

            
                <?php foreach ($movies as $movie): ?>
                <tr>
                    <td>
                        <?= $movie['id'] ?>
                    </td>
                    <td>
                        <?= $movie['title'] ?>
                    </td>
                    <td>
                        <a href="edit_movie.php?id=<?= $movie['id'] ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <form action="delete_movie.php" method="POST" class="d-inline-block mx-4">
                            <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                <?php endforeach; ?>
            
        </table>

    </div>
    <?php 
        include_once __DIR__ . "/includes/footer.php";
    ?>
</body>
</html>