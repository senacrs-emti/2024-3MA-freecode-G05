<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';
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
                        <label for="flUsuario">Usuário:</label>
                        <input type="text" placeholder = "Digite seu Usuário">
                        <label for="flSenha">Senha:</label>
                        <input type="password" placeholder = "Digite sua Senha">
                        <button class = "btn btn-entrar">Entrar</button>
                    </form>
                    <p>Ainda não tem conta?<a id="btnCadastro" href="#"><u>Cadastre-se</u></a></p>
                </div>
            </div>

            <div class="contentCadastro">

                <div class="alanpa">
                    <img src="../img/alanpapreto.png" alt="Foto Alan Patrick, jogador do Internacional">
                </div>

                <div class="cadastro">
                    <h2 class="title">Cadastre-se</h2>
                    <form class="fCadastro">
                        <label for="fcEmail">Email:</label>
                        <input type="email" placeholder = "Digite seu Email">
                        <label for="fcUsuario">Usuário:</label>
                        <input type="text" placeholder = "Digite seu Usuário">
                        <label for="fcSenha">Senha:</label>
                        <input type="password" placeholder = "Digite sua Senha">
                        <button class = "btn btn-cadastrar">Cadastrar</button>
                    </form>
                    <p>Já tem conta?<a id="btnLogin" href="#"><u>Entre</u></a></p>
                </div>
            </div>
        </div>
    </div>

<?php
include_once '../footer/footer.php'; 
?>