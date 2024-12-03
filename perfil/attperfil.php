<?php
include_once '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados enviados via AJAX ou pelo formulário
    $id_usuario = $_POST['id_usuario'];
    $nome_usuario = $_POST['nome_usuario'];
    $descricao = $_POST['descricao'];
    $time_preferido = $_POST['time_preferido'];

    // Atualizar no banco de dados, incluindo o nome de usuário
    $sql_update = "UPDATE perfil SET nome_usuario = ?, descricao = ?, idtime = ? WHERE iduser = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssii", $nome_usuario, $descricao, $time_preferido, $id_usuario);
    $stmt_update->execute();

    // Verificar se a atualização foi bem-sucedida
    if ($stmt_update->affected_rows > 0) {
        echo "Perfil atualizado com sucesso!";
    } else {
        echo "Não houve alterações no perfil ou erro na atualização.";
    }
}

    // Redirecionar após salvar
    header("Location: perfil.php");
?>