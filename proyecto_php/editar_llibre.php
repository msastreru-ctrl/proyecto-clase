<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';


if (!isset($_GET['id'])) {
    die("Error: falta ID del llibre");
}

$id = intval($_GET['id']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $any_publicacio = $_POST['any_publicacio'];
    $num_exemplars = $_POST['num_exemplars'];

    $sql = "
        UPDATE llibres
        SET titol='$titol',
            autor='$autor',
            isbn='$isbn',
            any_publicacio='$any_publicacio',
            num_exemplars='$num_exemplars'
        WHERE id=$id
    ";

    if ($conn->query($sql) === TRUE) {

        header("Location: llibres.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}


$result = $conn->query("SELECT * FROM llibres WHERE id=$id");

if ($result->num_rows == 0) {
    die("Llibre no trobat");
}

$llibre = $result->fetch_assoc();

include 'header.php';
?>

<h2>Editar llibre</h2>

<form method="POST">

    <label>Títol:</label><br>
    <input type="text" name="titol"
           value="<?= $llibre['titol'] ?>" required>
    <br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor"
           value="<?= $llibre['autor'] ?>" required>
    <br><br>

    <label>ISBN:</label><br>
    <input type="text" name="isbn"
           value="<?= $llibre['isbn'] ?>">
    <br><br>

    <label>Any publicació:</label><br>
    <input type="number" name="any_publicacio"
           value="<?= $llibre['any_publicacio'] ?>">
    <br><br>

    <label>Número d'exemplars:</label><br>
    <input type="number" name="num_exemplars"
           value="<?= $llibre['num_exemplars'] ?>" min="1">
    <br><br>

    <button type="submit">
        Actualitzar llibre
    </button>

</form>

<br>

<a href="llibres.php">
    ← Tornar
</a>

<?php include 'footer.php'; ?>