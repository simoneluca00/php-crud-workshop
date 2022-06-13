<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include_once __DIR__ . "/includes/header.php";
    ?>
    <title>Movies - Add</title>
</head>
<body>

    <div class="container py-5">
        <header>
            <h1 class="mb-4">ADD MOVIE</h1>
        </header>
        
        <form action="store_movie.php" method="POST">
            <input type="text" name="title" placeholder="Movie title" required>
            <button class="btn btn-primary" type="submit">Aggiungi</button>
        </form>
    </div>
    
    <?php 
        include_once __DIR__ . "/includes/footer.php";
    ?>

</body>
</html>