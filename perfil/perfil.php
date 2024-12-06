<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';
include_once '../login/validacao.php';

$id_usuario = $_SESSION['idlogin']; 
$id_perfil = $_GET['idperfil'] ?? null; 

$sql_user = "SELECT 
            l.user AS nome_usuario, p.descricao AS descricao_perfil
            FROM login l
            INNER JOIN perfil p
            ON l.idlogin = p.idlogin
            WHERE l.idlogin = ?";

$stmt_user = $conn->prepare($sql_user);
if ($stmt_user) {
    $stmt_user->bind_param('i', $id_usuario); // Corrigido para bind_param e uso do marcador "?"
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows >= 1) {
        while ($row = $result_user->fetch_assoc()) {
          $id_usuario = [
            "ID" => $id_usuario,
            "NOME" => $row['nome_usuario'],
            "DESCRICAO" => $row['descricao_perfil']
        ];        

            echo "Nome de Usuário: " . htmlspecialchars($row['nome_usuario']) . "<br>";
            echo "Descrição: " . htmlspecialchars($row['descricao_perfil']) . "<br>";
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
    $stmt_user->close();
} else {
    echo "Erro na consulta: " . $conn->error;
}





// Obter comentários do usuário
try {
  // Consulta SQL
  $sql_comentarios = "SELECT
                          a.idavaliacao,
                          a.comentario
                      FROM avaliacao AS a
                      INNER JOIN login AS l
                      ON a.idlogin = l.idlogin
                      INNER JOIN perfil AS p
                      ON a.idperfil = p.idperfil
                      WHERE a.idlogin = ?
                      AND a.idperfil = ?";
  
  // Preparar a consulta
  $stmt_comentarios = $conn->prepare($sql_comentarios);
  if (!$stmt_comentarios) {
      throw new Exception("Erro ao preparar a consulta de comentários: " . $conn->error);
  }
  
  // Vincular parâmetros
  $stmt_comentarios->bind_param("ii", $id_usuario['ID'], $id_perfil); // Tipos 'ii' para inteiros
  
  // Executar a consulta
  $stmt_comentarios->execute();
  
  // Obter resultados
  $result_comentarios = $stmt_comentarios->get_result();
  
  // Processar resultados
  if ($result_comentarios->num_rows > 0) {
      while ($row = $result_comentarios->fetch_assoc()) {
          echo "ID Avaliação: " . htmlspecialchars($row['idavaliacao']) . "<br>";
          echo "Comentário: " . htmlspecialchars($row['comentario']) . "<br>";
      }
  } else {
      echo "Nenhum comentário encontrado.";
  }

  // Fechar o statement
  $stmt_comentarios->close();

} catch (Exception $e) {
  // Tratamento de erros
  echo "Erro: " . $e->getMessage();
}



// Obter os times disponíveis
$sql_times = "SELECT idtime, nome FROM times ORDER BY nome ASC";
$result_times = $conn->query($sql_times);

if (!$result_times) {
  die("Erro ao obter times: " . $conn->error);
}

var_dump($result_comentarios);


?>

<div class="body-perfil">
  <div class="header-perfil">
    <img src="../img/<?php echo htmlspecialchars($usuario['capa']); ?>" alt="Imagem de Fundo">
  </div>

  <div class="profile-picture">
  <img src="../img/<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Foto de Perfil"> 
  </div>

  <div class="profile-info">
    <h1><?php echo htmlspecialchars($id_usuario['NOME']); ?></h1>
    <p><?php echo htmlspecialchars($id_usuario['DESCRICAO']); ?></p>
  </div>

  <button class="edit-button" onclick="abrirModal()">Editar Perfil</button>

  <div class="posts">
    <?php while ($comentario = $result_comentarios->fetch_assoc()): ?>
    <div class="post">
      <img src="../img/<?php echo $usuario['foto']; ?>" alt="Foto de Perfil">
      <div class="post-content">
        <h2><?php echo htmlspecialchars($usuario['nome']); ?></h2>
        <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
        <small><?php echo date("d/m/Y H:i", strtotime($comentario['datacriacao'])); ?></small>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

  <div class="comentarios-container" id="comentariosContainer"></div>

  <button class="add-comentario-btn" onclick="mostrarInputComentario()">+</button>

  <!-- Modal para editar o perfil -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="fecharModal()">&times;</span>
      <h2>Editar Perfil</h2>
      <form action="">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" id="username" value="<?php echo htmlspecialchars($id_usuario['NOME']); ?>"><br>
        <label for="descriptionPerfil">Descrição:</label>
        <textarea id="descriptionPerfil"><?php echo htmlspecialchars($id_usuario['DESCRICAO']); ?></textarea>

        <label for="time">Qual o seu time?</label> <br>
        <select name="time" id="time">
          <option value="">Escolha o time que você torce</option>
          <?php
            if ($result_times->num_rows > 0) {
              while ($time = $result_times->fetch_assoc()) {
                $selected = ($usuario['idtime'] == $time['idtime']) ? 'selected' : '';
                echo '<option value="' . htmlspecialchars($time['idtime']) . '" ' . $selected . '>' . htmlspecialchars($time['nome']) . '</option>';
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

<?php
include_once '../footer/footer.php'; 
?>