<?php
    include_once '../configuracao.php';
    include_once '../header/header.php'; 
    include_once '../database/conexao.php';
?>
<div class = "body-perfil">
  <div class="header-perfil">
    <img src="../img/gremio capa.jpeg" alt="Imagem de Fundo">
  </div>

  <div class="profile-picture">
    <img src="../img/foto-perfil.png" alt="Foto de Perfil">
  </div>

  <div class="profile-info">
    <h1>_viniross</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis enim, scelerisque at enim at.</p>
  </div>

  <button class="edit-button" onclick="abrirModal()">Editar Perfil</button>

  <div class="posts">
    <div class="post">
      <img src="../img/foto-perfil.png" alt="Foto de Perfil">
      <div class="post-content">
        <h2>_viniross</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis enim, scelerisque at enim at.</p>
      </div>
    </div>
    <div class="post">
      <img src="../img/foto-perfil.png" alt="Foto de Perfil">
      <div class="post-content">
        <h2>_viniross</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis enim, scelerisque at enim at.</p>
      </div>
    </div>
  </div>

  <!-- Container para os comentários -->
  <div class="comentarios-container" id="comentariosContainer">
    <!-- Novos comentários aparecerão aqui -->
  </div>

  <!-- Botão para adicionar um novo comentário -->
  <button class="add-comentario-btn" onclick="mostrarInputComentario()">+</button>

  <script src="perfil.js"></script>

  <!-- Modal para editar o perfil -->
    <div id="editModal" class="modal">
        <div class="modal-content">
        <span class="close-button" onclick="fecharModal()">&times;</span>
        <h2>Editar Perfil</h2>
        <form action="">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" value="_viniross">

            <label for="description">Descrição:</label>
            <textarea id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis enim, scelerisque at enim at.</textarea>

            <label for="time">Qual o seu time?</label> <br>
            <select name="time">
                <option value="">Escolha o time que você torce</option>
                <option value="CAP">Athletico-PR</option>
                <option value="ACG">Atlético-GO</option>
                <option value="CAM">Atlético-MG</option>
                <option value="ECB">Bahia</option>
                <option value="BOT">Botafogo</option>
                <option value="COR">Corinthians</option>
                <option value="CRI">Criciúma</option>
                <option value="CRU">Cruzeiro</option>
                <option value="CUI">Cuiabá</option>
                <option value="FLA">Flamengo</option>
                <option value="FLU">Fluminense</option>
                <option value="FOR">Fortaleza</option>
                <option value="GRE">Grêmio</option>
                <option value="INT">Internacional</option>
                <option value="JUV">Juventude</option>
                <option value="PAL">Palmeiras</option>
                <option value="RBG">Red Bull Bragantino</option>
                <option value="SAO">São Paulo</option>
                <option value="VAS">Vasco da Gama</option>
                <option value="VIT">Vitória</option>
            </select>
        </form>
            <button class="salvar-perfil" onclick="salvarEdicao()">Salvar</button>
        </div>
    </div>
</div>