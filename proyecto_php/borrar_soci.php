<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';


if (!isset($_GET['id'])) {
    die("Error: falta ID del soci");
}

$id = intval($_GET['id']);


$check = $conn->query("
    SELECT COUNT(*) AS total
    FROM prestecs
    WHERE id_soci = $id
");

$row = $check->fetch_assoc();

if ($row['total'] > 0) {

    die("
        <h2>Error</h2>
        <p>Aquest soci no es pot esborrar perquè té préstecs associats.</p>
        <a href='socis.php'>Tornar</a>
    ");
}


$sql = "DELETE FROM socis WHERE id = $id";

if ($conn->query($sql) === TRUE) {

    header("Location: socis.php");
    exit();

} else {

    echo "Error al esborrar: " . $conn->error;
}
?>