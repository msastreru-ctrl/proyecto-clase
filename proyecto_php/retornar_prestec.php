<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';


if (!isset($_GET['id'])) {
    die("Error: falta ID del préstec");
}

$id = $_GET['id'];


$sql = "
UPDATE prestecs
SET data_retorn_real = CURDATE()
WHERE id = $id
";

if ($conn->query($sql) === TRUE) {

    header("Location: prestecs.php");
    exit();

} else {

    echo "Error al retornar préstec: " . $conn->error;
}
?>