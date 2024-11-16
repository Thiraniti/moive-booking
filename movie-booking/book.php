<?php
include('config.php');
if (isset($_POST['book'])) {
    $movie_id = $_POST['movie_id'];
    $user_name = $_POST['user_name'];
    $seats = $_POST['seats'];

    $stmt = $conn->prepare("INSERT INTO bookings (movie_id, user_name, seats) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $movie_id, $user_name, $seats);
    $stmt->execute();
    $stmt->close();

    echo "Booking successful!";
} else {
    $movie_id = $_GET['movie_id'];
    $movie = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM movies WHERE id=$movie_id"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Movie</title>
</head>
<body>
    <h1>Book Tickets for <?= $movie['title']; ?></h1>
    <form action="book.php" method="POST">
        <input type="hidden" name="movie_id" value="<?= $movie['id']; ?>">
        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" required>
        <label for="seats">Number of Seats:</label>
        <input type="number" name="seats" required>
        <button type="submit" name="book">Book Now</button>
    </form>
</body>
</html>
