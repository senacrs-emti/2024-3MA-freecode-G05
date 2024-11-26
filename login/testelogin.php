<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    
    include_once ('../database/conexao.php'); 
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM login WHERE user = ? AND senha = ?");
    $stmt->bind_param("ss", $user, $senha);
    $stmt->execute();

    $result = $stmt->get_result(); 

    if ($result === false) {
        die("Erro na consulta SQL: " . $conn->error); 
    }

    if ($result->num_rows < 1) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    } else {
        $_SESSION['usuario'] = $user;
        $_SESSION['senha'] = $senha;
       header('Location: ../main/index.php');
    }

    $stmt->close(); 
    $conn->close(); 
} else {
    header('Location: login.php');
    exit(); 
}
