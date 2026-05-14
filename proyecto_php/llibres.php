<?php
include 'db.php';
include 'header.php';



$sql = "
SELECT llibres.*,
COUNT(prestecs.id) AS en_prestec

FROM llibres

LEFT JOIN prestecs
ON llibres.id = prestecs.id_llibre
AND prestecs.data_retorn_real IS NULL

GROUP BY llibres.id

ORDER BY llibres.titol ASC
";

$result = $conn->query($sql);
?>

<h2>Llistat de llibres</h2>

<a href="nou_llibre.php"> Nou llibre</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Títol</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Any</th>
        <th>Exemplars</th>
        <th>Estat</th>
        <th>Accions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>

    <tr>

        <td><?= $row['id'] ?></td>

        <td><?= $row['titol'] ?></td>

        <td><?= $row['autor'] ?></td>

        <td><?= $row['isbn'] ?></td>

        <td><?= $row['any_publicacio'] ?></td>

        <td><?= $row['num_exemplars'] ?></td>

        <td>

            <?php
            if ($row['en_prestec'] > 0) {
                echo "<span style='color:red;'>En préstec</span>";
            } else {
                echo "<span style='color:green;'>Disponible</span>";
            }
            ?>

        </td>

        <td>

            <a href="editar_llibre.php?id=<?= $row['id'] ?>">
                Editar
            </a>

            |

            <a href="borrar_llibre.php?id=<?= $row['id'] ?>"
               onclick="return confirm('Segur que vols esborrar aquest llibre?')">
                Esborrar
            </a>

        </td>

    </tr>

    <?php } ?>

</table>

<?php include 'footer.php'; ?>