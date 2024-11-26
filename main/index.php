<?php
include '../configuracao.php'; 
include '../header/header.php'; 
session_start();
print_r($_SESSION);

?>
<section>
    <!-- Tabela da Esquerda com barra de rolagem na esquerda -->
    <div class="partidas_left">
        <!-- Conteúdo da tabela da esquerda (jogos) -->
        <div class="barra">
            <img class="times" src="../img/gremio.png" alt=""><p>GRE</p>
            <p>X</p>
            <p>INT</p><img class="times" src="../img/inter.png" alt="">
        </div>
        <div class="barra">
            <img class="times" src="../img/FLA.png" alt=""><p>FLA</p>
            <p>X</p>
            <p>VAS</p><img class="times" src="../img/VAS.png" alt="">
        </div>
        <div class="barra">
            <img class="times" src="../img/CRU.png" alt=""><p>CRU</p>
            <p>X</p>
            <p>CAM</p><img class="times" src="../img/CAM.png" alt="">
        </div>
        <!-- Outros jogos podem ser adicionados aqui -->
    </div>

    <!-- Tabela da Direita com barra de rolagem na direita -->
    <div class="partidas_right">
        <div class="titulo-classificacao">TABELA DE CLASSIFICAÇÃO</div>
        <div class="tabela">
            <div class="topo">
                <p>Pos</p>
                <p>Time</p>
                <p>Pontos</p>
                <p>Vitórias</p>
                <p>Empates</p>
                <p>Derrotas</p>
                <p>Saldo</p>
            </div>
            <div class="time-item">
                <p>1</p>
                <img class="times" src="../img/BOT.png" alt="">Botafogo
                <p>70</p><p>22</p><p>4</p><p>4</p><p>30</p>
            </div>
            <div class="time-item">
                <p>2</p>
                <img class="times" src="../img/PAL.png" alt=""><p>Palmeiras</p>
                <p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
            </div>
            <!-- Outros times da tabela podem ser adicionados aqui -->
        </div>
    </div>
</section>

<?php
include '../footer/footer.php'; 
?>
