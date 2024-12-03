<?php
include_once '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $conteudo = $_POST['conteudo'];

    $sql_comentario = "INSERT INTO comentarios (id_usuario, conteudo) VALUES (?, ?)";
    $stmt_comentario = $conn->prepare($sql_comentario);
    $stmt_comentario->bind_param("is", $id_usuario, $conteudo);
    $stmt_comentario->execute();

    // Retornar sucesso
    echo "Comentário adicionado com sucesso!";
}
?>
