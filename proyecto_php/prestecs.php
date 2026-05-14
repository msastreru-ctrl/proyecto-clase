<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
include 'header.php';


$sql = "
SELECT prestecs.*,
socis.nom AS nom_soci,
llibres.titol AS titol_llibre

FROM prestecs

JOIN socis
ON prestecs.id_soci = socis.id

JOIN llibres
ON prestecs.id_llibre = llibres.id

ORDER BY prestecs.data_prestec DESC
";

$result = $conn->query($sql);
?>

<h2>Llistat de préstecs</h2>

<a href="nou_prestec.php">
     Nou préstec
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Soci</th>
        <th>Llibre</th>
        <th>Data préstec</th>
        <th>Retorn previst</th>
        <th>Retorn real</th>
        <th>Estat</th>
        <th>Accions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>

    <tr>

        <td><?= $row['id'] ?></td>

        <td><?= $row['nom_soci'] ?></td>

        <td><?= $row['titol_llibre'] ?></td>

        <td><?= $row['data_prestec'] ?></td>

        <td><?= $row['data_retorn_prevista'] ?></td>

        <td>

            <?php
            if ($row['data_retorn_real'] == NULL) {
                echo "-";
            } else {
                echo $row['data_retorn_real'];
            }
            ?>

        </td>

        <td>

            <?php
            if ($row['data_retorn_real'] == NULL) {

                echo "<span style='color:red;'>
                        En préstec
                      </span>";

            } else {

                echo "<span style='color:green;'>
                        Retornat
                      </span>";
            }
            ?>

        </td>

        <td>

            <?php if ($row['data_retorn_real'] == NULL) { ?>

                <a href="retornar_prestec.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Marcar llibre com retornat?')">

                    Retornar

                </a>

            <?php } else { ?>

                -

            <?php } ?>

        </td>

    </tr>

    <?php } ?>

</table>

<?php include 'footer.php'; ?>