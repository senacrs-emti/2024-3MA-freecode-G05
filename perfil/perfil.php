<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="perfil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="header">
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
    <label for="username">Nome de Usuário:</label>
    <input type="text" id="username" value="_viniross">

    <label for="description">Descrição:</label>
    <textarea id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis enim, scelerisque at enim at.</textarea>

    <button class="salvar-perfil" onclick="salvarEdicao()">Salvar</button>
  </div>
</div>

</body>
</html>