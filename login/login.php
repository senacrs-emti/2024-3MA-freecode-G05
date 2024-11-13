<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
?>

    <div class="container">
        <div class="content">

        <div class="contentLogin">

            <div class="villa">
                <img src="../img/villa.png" alt="Foto Villasanti, jogador do Grêmio">
            </div>

            <div class="login">
                <h2 class="title">Login</h2>
                <form class="fLogin">
                    <label for="fUsuario">Usuário:</label>
                    <input type="text" placeholder = "Digite seu Usuário">
                    <label for="fSenha">Senha:</label>
                    <input type="password" placeholder = "Digite sua Senha">
                    <button class = "btn btn-entrar">Entrar</button>
                </form>
                <p>Ainda não tem conta?<a href="#"><u>Cadastre-se</u></a></p>
            </div>
        </div>

        <div class="contentCadastro">

        <div class="alanpa">
            <img src="../img/alanpapreto.png" alt="Foto Alan Patrick, jogador do Internacional">
        </div>

        <div class="cadastro">
                <h2 class="title">Cadastre-se</h2>
                <form class="fCadastro">
                    <label for="fEmail">Email:</label>
                    <input type="email" placeholder = "Digite seu Email">
                    <label for="fUsuario">Usuário:</label>
                    <input type="text" placeholder = "Digite seu Usuário">
                    <label for="fSenha">Senha:</label>
                    <input type="password" placeholder = "Digite sua Senha">
                    <button class = "btn">Cadastrar</button>
                </form>
                <p>Já tem conta?<a href="#"><u>Entre</u></a></p>
            </div>
        </div>
        </div>
    </div>

<?php
include_once '../footer/footer.php'; 
?>