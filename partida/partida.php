<?php 
include_once '../configuracao.php';
include_once '../database/conexao.php';
include_once '../login/validacao.php';
include_once '../header/header.php';

?>

<div class="container-partida">
        <img src="<?php echo $varPathLocal;?>img/GRENAL.jpg" alt="Imagem desfocada" class="background">
        <div class="content-partida">
            <div class="placar">
                <div class="time">
                    <img src="<?php echo $varPathLocal;?>img/gremio.png" alt="Logo Grêmio" class="logo-time">
                    <span class="nome-time">GRE</span>
                </div>
                <span class="resultado">1</span>
                <span class="x">X</span>
                <span class="resultado">1</span>
                <div class="time">
                    <span class="nome-time">INT</span>
                    <img src="<?php echo $varPathLocal;?>img/inter.png" alt="Logo Internacional" class="logo-time">
                </div>
            </div>
        </div>
    </div>
 
    <div class="timeline-container">
        <div class="timeline">
            <div class="recFimDeJogo">Fim de Jogo</div>
           
            <div class="event event-time1">
                <span class="minute">90'</span>
                <span class="player">Pepê</span>
                <img src="<?php echo $varPathLocal;?>img/cartao amarelo.png" alt="Yellow Card" class="icon">
            </div>
       
            <div class="event event-time2">
                <span class="minute">90'</span>
                <span class="player">Rogel</span>
                <img src="<?php echo $varPathLocal;?>img/cartao vermelho.png" alt="Red Card" class="icon">
            </div>
       
            <div class="event event-time1">
                <span class="minute">89'</span>
                <span class="player">Dodi</span>
                <img src="<?php echo $varPathLocal;?>img/troca.png" alt="Substitution" class="icon">
                <span class="sub-out">Pepê</span>
            </div>
       
            <div class="recIntervalo">Intervalo</div>
       
            <div class="event event-time1">
                <span class="minute">45'</span>
                <span class="player">D. Costa</span>
                <img src="<?php echo $varPathLocal;?>img/gol.png" alt="Goal" class="icon">
            </div>
       
            <div class="event event-time2">
                <span class="minute">39'</span>
                <span class="player">R. Ely</span>
                <img src="<?php echo $varPathLocal;?>img/gol contra.png" alt="Own Goal" class="icon">
            </div>
        </div>
   
        <div class="comentarios-container">
            <div class="comentario">
                <div class="foto-perfil">
                    <img src="<?php echo $varPathLocal;?>img/foto-perfil.png" alt="Foto do usuário">
                </div>
                <div class="conteudo-comentario">
                    <div class="id-perfil">_viniross</div>
                    <div class="texto-comentario">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>
            </div>
       
            <button class="add-comentario-btn" onclick="mostrarInputComentario()">+</button>
        </div>
    </div>
    <script src="partida.js"></script>
<?php
include_once '../footer/footer.php'; 
?>