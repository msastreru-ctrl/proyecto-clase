<?php
include 'db.php';
include 'header.php';

$sql = "SELECT * FROM socis";
$result = $conn->query($sql);
?>

<h2>Llistat de socis</h2>

<a class="btn" href="nou_soci.php">Nou soci</a>

<table>
<tr>
    <th>Nom</th>
    <th>Email</th>
    <th>Accions</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['nom'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="editar_soci.php?id=<?= $row['id'] ?>">Editar</a>
        <a href="borrar_soci.php?id=<?= $row['id'] ?>">Esborrar</a>
    </td>
</tr>

<?php } ?>

</table>

<?php include 'footer.php'; ?>