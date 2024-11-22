<?php

include_once 'conexao.php';

$sql = "SELECT idtime, nome, sigla, estadio FROM times";
$result = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo '<pre>';
print_r($dados);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
