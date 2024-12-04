<?php
include_once '../configuracao.php';
$pagina = 'time';
include_once '../header/header.php'; 
include_once '../database/conexao.php';

// Obtém o ID do time passado na URL
$idTime = isset($_GET['t']) ? intval($_GET['t']) : 0;

// Verifica se o ID do time foi informado
if ($idTime > 0) {
    // Consulta para obter informações do time
    $sqlTime = "
        SELECT 
            t.idtime,
            t.nome AS NomeTime,
            t.escudo AS EscudoTime,
            t.mascote AS MascoteTime
        FROM times AS t
        WHERE t.idtime = $idTime
    ";
    $resultTime = mysqli_query($conn, $sqlTime);

    // Verifica se o time foi encontrado
    if ($resultTime && mysqli_num_rows($resultTime) > 0) {
        $time = mysqli_fetch_assoc($resultTime);
    } else {
        echo "<p>Time não encontrado.</p>";
        include_once '../footer/footer.php';
        exit;
    }

    // Consulta para obter as próximas partidas do time
    $sqlPartidas = "
        SELECT 
            p.data,
            p.hora,
            p.estadio,
            CASE 
                WHEN p.idtimeCasa = $idTime THEN p.idtimeVis
                ELSE p.idtimeCasa 
            END AS IdAdversario,
            CASE 
                WHEN p.idtimeCasa = $idTime THEN tv.nome
                ELSE tc.nome
            END AS NomeAdversario,
            CASE 
                WHEN p.idtimeCasa = $idTime THEN tv.escudo
                ELSE tc.escudo
            END AS EscudoAdversario
        FROM partidas AS p
        INNER JOIN times AS tc ON p.idtimeCasa = tc.idtime
        INNER JOIN times AS tv ON p.idtimeVis = tv.idtime
        WHERE p.idtimeCasa = $idTime OR p.idtimeVis = $idTime
        ORDER BY p.data ASC
    ";
    $resultPartidas = mysqli_query($conn, $sqlPartidas);
} else {
    echo "<p>ID do time inválido.</p>";
    include_once '../footer/footer.php';
    exit;
}
?>

    <header>
        <img src="../img/times/<?php echo $time['EscudoTime']; ?>" alt="Escudo <?php echo $time['NomeTime']; ?>">
        <h1><?php echo $time['NomeTime']; ?></h1>
        <img src="../img/mascotes/<?php echo $time['MascoteTime']; ?>" alt="Mascote <?php echo $time['NomeTime']; ?>">
    </header>
    <div class="partidas">
    <h2 id="prox-partidas">Próximas Partidas</h2>
    <?php if ($resultPartidas && mysqli_num_rows($resultPartidas) > 0): ?>
        <?php while ($partida = mysqli_fetch_assoc($resultPartidas)): ?>
            <div class="barra-time">
                <div class="times-container">
                    <img class="times" src="../img/times/<?php echo $time['EscudoTime']; ?>" alt="Escudo <?php echo $time['NomeTime']; ?>">
                    <p><?php echo strtoupper(substr($time['NomeTime'], 0, 3)); ?></p>
                    <p>X</p>
                    <p><?php echo strtoupper(substr($partida['NomeAdversario'], 0, 3)); ?></p>
                    <img class="times" src="../img/times/<?php echo $partida['EscudoAdversario']; ?>" alt="Escudo <?php echo $partida['NomeAdversario']; ?>">
                </div>
                <div class="info">
                    <p>Local: <?php echo $partida['estadio']; ?></p>
                    <p>Data: <?php echo date('d/m/Y', strtotime($partida['data'])); ?></p>
                    <p>Horário: <?php echo $partida['hora']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Não há partidas futuras programadas.</p>
    <?php endif; ?>
</div>
<?php
    include_once '../footer/footer.php';
?>