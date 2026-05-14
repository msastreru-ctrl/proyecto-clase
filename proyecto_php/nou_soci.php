<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $data_alta = $_POST['data_alta'];
    $actiu = $_POST['actiu'];

    $sql = "INSERT INTO socis (nom, telefon, email, data_alta, actiu)
            VALUES ('$nom', '$telefon', '$email', '$data_alta', '$actiu')";

    if ($conn->query($sql) === TRUE) {

        header("Location: socis.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}
?>

<?php include 'header.php'; ?>

<h2>Nou Soci</h2>

<form method="POST">

    <label>Nom:</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Telèfon:</label><br>
    <input type="text" name="telefon"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Data alta:</label><br>
    <input type="date" name="data_alta" value="<?= date('Y-m-d') ?>" required><br><br>

    <label>Actiu:</label><br>
    <select name="actiu">
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select><br><br>

    <button type="submit">Guardar soci</button>

</form>

<?php include 'footer.php'; ?>