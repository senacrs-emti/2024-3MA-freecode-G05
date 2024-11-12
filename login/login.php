<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">

        <div class="content login">

            <div class="villa">
                <img src="../img/villa.png" alt="Foto Villasanti, jogador do Grêmio">
            </div>

            <div class="login">
                <h2 class="title">Login</h2>
                <form class="fLogin">
                    <label for="fUsuario">Usuário:</label>
                    <br>
                    <input type="text" placeholder = "Digite seu Usuário">
                    <br>
                    <label for="fSenha">Senha:</label>
                    <br>
                    <input type="password" placeholder = "Digite sua Senha">
                    <br>
                    <button class = "btn">Entrar</button>
                </form>
                <p>Ainda não tem conta?<a href="#"><u>Cadastre-se</u></a></p>
            </div>
        </div>

        <div class="content cadastro">

        <div class="alanpa">
            <img src="../img/alanpapreto.png" alt="Foto Villasanti, jogador do Grêmio">
        </div>

        <div class="cadastro">
                <h2 class="title">Cadastre-se</h2>
                <form class="fCadastro">
                    <label for="fEmail">Email:</label>
                    <br>
                    <input type="email" placeholder = "Digite seu Email">
                    <br>
                    <label for="fUsuario">Usuário:</label>
                    <br>
                    <input type="text" placeholder = "Digite seu Usuário">
                    <br>
                    <label for="fSenha">Senha:</label>
                    <br>
                    <input type="password" placeholder = "Digite sua Senha">
                    <br>
                    <button class = "btn">Cadastrar</button>
                </form>
                <p>Já tem conta?<a href="#"><u>Entre</u></a></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include_once '../footer/footer.php'; 
?>