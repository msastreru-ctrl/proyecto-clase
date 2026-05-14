<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $any_publicacio = $_POST['any_publicacio'];
    $num_exemplars = $_POST['num_exemplars'];

    $sql = "INSERT INTO llibres
            (titol, autor, isbn, any_publicacio, num_exemplars)

            VALUES

            ('$titol', '$autor', '$isbn', '$any_publicacio', '$num_exemplars')";

    if ($conn->query($sql) === TRUE) {

        header("Location: llibres.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}

include 'header.php';
?>

<h2>Nou llibre</h2>

<form method="POST">

    <label>Títol:</label><br>
    <input type="text" name="titol" required>
    <br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" required>
    <br><br>

    <label>ISBN:</label><br>
    <input type="text" name="isbn" required>
    <br><br>

    <label>Any publicació:</label><br>
    <input type="number"
           name="any_publicacio"
           min="1900"
           max="<?= date('Y') ?>">
    <br><br>

    <label>Número exemplars:</label><br>
    <input type="number"
           name="num_exemplars"
           min="1"
           value="1"
           required>
    <br><br>

    <button type="submit">
        Guardar llibre
    </button>

</form>

<br>

<a href="llibres.php">
    ← Tornar a llibres
</a>

<?php include 'footer.php'; ?>