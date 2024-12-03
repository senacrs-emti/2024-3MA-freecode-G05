<?php
include_once '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nome_usuario = $_POST['nome_usuario'];
    $descricao = $_POST['descricao'];
    $time_preferido = $_POST['time_preferido'];
    
    $sql_update = "UPDATE usuarios SET nome_usuario = ?, descricao = ?, time_preferido = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssi", $nome_usuario, $descricao, $time_preferido, $id_usuario);
    $stmt_update->execute();

    // Redirecionar após salvar
    header("Location: perfil.php");
}
?>