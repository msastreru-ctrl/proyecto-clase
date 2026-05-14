<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';


if (!isset($_GET['id'])) {
    die("Error: falta ID del soci");
}

$id = $_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $actiu = $_POST['actiu'];

    $sql = "
        UPDATE socis
        SET nom='$nom',
            telefon='$telefon',
            email='$email',
            actiu='$actiu'
        WHERE id=$id
    ";

    if ($conn->query($sql) === TRUE) {

        header("Location: socis.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}


$result = $conn->query("SELECT * FROM socis WHERE id=$id");

if ($result->num_rows == 0) {
    die("Soci no trobat");
}

$soci = $result->fetch_assoc();

include 'header.php';
?>

<h2>Editar soci</h2>

<form method="POST">

    <label>Nom:</label><br>
    <input type="text" name="nom"
           value="<?= $soci['nom'] ?>" required>
    <br><br>

    <label>Telèfon:</label><br>
    <input type="text" name="telefon"
           value="<?= $soci['telefon'] ?>">
    <br><br>

    <label>Email:</label><br>
    <input type="email" name="email"
           value="<?= $soci['email'] ?>" required>
    <br><br>

    <label>Actiu:</label><br>
    <select name="actiu">

        <option value="1"
        <?php if ($soci['actiu'] == 1) echo "selected"; ?>>
            Sí
        </option>

        <option value="0"
        <?php if ($soci['actiu'] == 0) echo "selected"; ?>>
            No
        </option>

    </select>

    <br><br>

    <button type="submit">
        Actualitzar soci
    </button>

</form>

<br>

<a href="socis.php">
    ← Tornar
</a>

<?php include 'footer.php'; ?>