<?php
include('config.php');
$movies = mysqli_query($conn, "SELECT * FROM movies");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Available Movies</h1>
    <div class="movie-list">
        <?php while ($movie = mysqli_fetch_assoc($movies)): ?>
            <div class="movie">
                <img src="images/<?= $movie['image']; ?>" alt="<?= $movie['title']; ?>">
                <h3><?= $movie['title']; ?></h3>
                <p><?= $movie['description']; ?></p>
                <p>Show Time: <?= $movie['show_time']; ?> on <?= $movie['date']; ?></p>
                <a href="book.php?movie_id=<?= $movie['id']; ?>">Book Now</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
