<?php

if ((!isset($_SESSION['usuario']) == true) && (!isset($_SESSION['senha']) == true) ){
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: ../login/login.php');
}
$logado = $_SESSION['usuario'];


?>