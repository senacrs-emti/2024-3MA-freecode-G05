<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';

// Pegar o ID do usuário logado (substituir por sessão ou método apropriado)
$id_usuario = 1; 

// Obter dados do usuário
$sql_usuario = "SELECT nome, foto, user, avaliacao_idavaliacao FROM login WHERE idlogin = ?";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bind_param("i", $id_usuario);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();

if (!$usuario) {
  echo "Usuário não encontrado.";
  exit;
}

// Obter comentários do usuário
$sql_comentarios = "SELECT comentario, datacriacao FROM avaliacao WHERE idlogin = ? ORDER BY datacriacao DESC";
$stmt_comentarios = $conn->prepare($sql_comentarios);
$stmt_comentarios->bind_param("i", $id_usuario);
$stmt_comentarios->execute();
$result_comentarios = $stmt_comentarios->get_result();

$sql_times = "SELECT idtime, nome FROM times ORDER BY nome ASC";
$result_times = $conn->query($sql_times);
?>

<div class="body-perfil">
  <div class="header-perfil">
    <img src="../img/gremio capa.jpeg" alt="Imagem de Fundo">
  </div>

  <div class="profile-picture">
    <img src="../img/<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Foto de Perfil">
  </div>

  <div class="profile-info">
    <h1><?php echo htmlspecialchars($usuario['user']); ?></h1>
    <p></p>
  </div>

  <button class="edit-button" onclick="abrirModal()">Editar Perfil</button>

  <div class="posts">
    <?php while ($comentario = $result_comentarios->fetch_assoc()): ?>
    <div class="post">
      <img src="../img/<?php echo $usuario['foto_perfil']; ?>" alt="Foto de Perfil">
      <div class="post-content">
        <h2><?php echo htmlspecialchars($usuario['nome']); ?></h2>
        <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
        <small><?php echo date("d/m/Y H:i", strtotime($comentario['datacriacao'])); ?></small>
      </div>
    </div>
    <?php endwhile; ?> <!-- Fechamento do loop -->
  </div>

  <!-- Container para os comentários -->
  <div class="comentarios-container" id="comentariosContainer">
    <!-- Novos comentários aparecerão aqui -->
  </div>

  <!-- Botão para adicionar um novo comentário -->
  <button class="add-comentario-btn" onclick="mostrarInputComentario()">+</button>

  <!-- Modal para editar o perfil -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="fecharModal()">&times;</span>
      <h2>Editar Perfil</h2>
      <form action="">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" value="<?php echo htmlspecialchars($usuario['user']); ?>">

        <label for="description">Descrição:</label>
        <textarea id="description"></textarea>

        <label for="time">Qual o seu time?</label> <br>
        <select name="time">
          <option value="">Escolha o time que você torce</option>
          <?php
            if ($result_times->num_rows > 0) {
              while ($time = $result_times->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($time['idtime']) . '">' . htmlspecialchars($time['nome']) . '</option>';
              }
            } else {
              echo '<option value="">Nenhum time disponível</option>';
            }
          ?>
        </select>
      </form>
      <button class="salvar-perfil" onclick="salvarEdicao()">Salvar</button>
    </div>
  </div>
</div>

<script src="perfil.js"></script>