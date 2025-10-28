<?php
require_once 'db.php';

$id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");

        $stmt->execute([$id]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $launch_date = $_POST['launch_date'];
        $film_genre = $_POST['film_genre'];

        $stmt = $pdo->prepare("UPDATE movies SET name = ?, launch_date = ?, film_genre = ? WHERE id = ?");

        $stmt->execute([$name, $launch_date, $film_genre, $id]);

        echo "Filme modificado com sucesso";

    }
?>

<html>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    ?>

    <form method="POST">
        Nome: <input type="text" name="name" value="<?php echo $movie['name'];?>">
        <br>Lançamento: <input type="date" name="launch_date" value="<?php echo $user["launch_date"];?>">
        <br>Gênero: <input type="text" name="film_genre" value="<?php echo $user["film_genre"];?>">
        <br><input type="submit">
    </form>
    <?php
        }
    ?>

</html>