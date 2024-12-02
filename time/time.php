<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';
?>

    <header>
        <img src="../img/gremio.png">
        <h1>Grêmio</h1>
        <img src="../img/mascotes/gremio.png">
    </header>
    <div class="barra">
    <div class="times-container">
        <img class="times" src="../img/gremio.png" alt=""><p>GRE</p>
        <p>X</p>
        <p>INT</p><img class="times" src="../img/inter.png" alt="">
    </div>
    <div class="info">
        <p>Local: Arena do Grêmio</p>
        <p>Data: 03/11/2024</p>
        <p>Horário: 16:00</p>
    </div>
</div>
<?php
    include_once '../footer/footer.php';
?>