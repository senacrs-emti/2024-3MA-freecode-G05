<?php 
$negarPaginas = array('partida.php');
$path = explode('/',$_SERVER['SCRIPT_NAME']);
$file = end($path);
$time = date("YmdHis").rand(1,9999);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidas</title>
    <link rel="stylesheet" href="<?php echo $varPathLocal;?>header/topo.css?t=<?php echo $time;?>">
    <link rel="stylesheet" href="<?php echo $varPathLocal;?>main/enem.css?t=<?php echo $time;?>">
    <link rel="stylesheet" href="<?php echo $varPathLocal;?>footer/baixo.css?t=<?php echo $time;?>">
    <link rel="stylesheet" href="<?php echo $varPathLocal;?>login/login.css?t=<?php echo $time;?>">
    <link rel="stylesheet" href="<?php echo $varPathLocal;?>partida/partida.css?t=<?php echo $time;?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<input type="hidden" value="<?php echo $varPathLocal;?>" id="path">
<?php
if( !in_array($file,$negarPaginas) ){
?>
    <div class="header">
        <!-- logo -->
        <img src="<?php echo $varPathLocal;?>header/rateMatchLogo.png" alt="Logo" class="logo">
        
        <!-- menu -->
        <nav class="menu">
            <a href="../main/index.php">Jogos</a>
            <a href="#">Feed</a>
        </nav>
        
        <!-- barra de pesquisa -->
        <div class="search-container">
            <input type="text" placeholder="Buscar..." class="search-bar">
            <button class="search-button"><img src="<?php echo $varPathLocal;?>header/lupa_de_pesquisa.png" width="20px" height="20px" alt=""></button> <!-- ícone de lupa -->
        </div>
        
        <!-- icone do usuário -->
        <a href="<?php echo $varPathLocal;?>login/login.php"><img src="<?php echo $varPathLocal;?>header/icone_perfil.png" alt="Usuário" class="user-icon"></a>
    </div>

<?php
}
?>