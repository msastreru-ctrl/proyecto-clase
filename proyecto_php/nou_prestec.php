<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_soci = $_POST['id_soci'];
    $id_llibre = $_POST['id_llibre'];
    $data_prestec = date('Y-m-d');

    // +15 dies
    $data_retorn_prevista = date('Y-m-d', strtotime('+15 days'));

    $sql = "
        INSERT INTO prestecs
        (data_prestec, data_retorn_prevista, data_retorn_real, id_soci, id_llibre)
        VALUES
        ('$data_prestec', '$data_retorn_prevista', NULL, '$id_soci', '$id_llibre')
    ";

    if ($conn->query($sql) === TRUE) {

        header("Location: prestecs.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}

include 'header.php';


$socis = $conn->query("SELECT * FROM socis WHERE actiu = 1");


$llibres = $conn->query("
    SELECT l.*
    FROM llibres l
    WHERE l.num_exemplars >
    (
        SELECT COUNT(*)
        FROM prestecs p
        WHERE p.id_llibre = l.id
        AND p.data_retorn_real IS NULL
    )
");
?>

<h2>Nou préstec</h2>

<form method="POST">

    <label>Soci:</label><br>
    <select name="id_soci" required>
        <option value="">-- Selecciona soci --</option>

        <?php while($soci = $socis->fetch_assoc()) { ?>
            <option value="<?= $soci['id'] ?>">
                <?= $soci['nom'] ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <label>Llibre:</label><br>
    <select name="id_llibre" required>
        <option value="">-- Selecciona llibre --</option>

        <?php while($llibre = $llibres->fetch_assoc()) { ?>
            <option value="<?= $llibre['id'] ?>">
                <?= $llibre['titol'] ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <button type="submit">
        Crear préstec
    </button>

</form>

<br>

<a href="prestecs.php">
    ← Tornar a préstecs
</a>

<?php include 'footer.php'; ?>