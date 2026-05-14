<?php include 'header.php'; ?>

<h2>Biblioteca Municipal d’Alaró</h2>

<p style="text-align:center; max-width:800px; margin: 0 auto;">
    La Biblioteca Municipal d’Alaró, situada al cor de Mallorca, és un espai cultural dedicat a la
    lectura, l’aprenentatge i la difusió del coneixement.
</p>

<br>

<p style="text-align:center; max-width:800px; margin: 0 auto;">
    Ofereix als ciutadans un ampli catàleg de llibres, serveis de préstec i activitats culturals
    per fomentar l’hàbit lector entre totes les edats. Aquest sistema web permet gestionar de manera
    eficient els socis, els llibres i els préstecs de la biblioteca.
</p>

<br>

<div class="dashboard">

    <div class="card">
        <h3>Socis</h3>
        <p>Gestió dels usuaris registrats.</p>
        <a href="socis.php">Entrar</a>
    </div>

    <div class="card">
        <h3>Llibres</h3>
        <p>Catàleg complet de la biblioteca.</p>
        <a href="llibres.php">Entrar</a>
    </div>

    <div class="card">
        <h3>Préstecs</h3>
        <p>Control de llibres prestats i retorns.</p>
        <a href="prestecs.php">Entrar</a>
    </div>

</div>

<?php include 'footer.php'; ?>