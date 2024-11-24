<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';

    if (isset($_POST['submit'])) {
        /*print_r('Usuário: ' . $_POST['usuario']);
        print_r('<br>');
        print_r('Email: ' .$_POST['email']);
        print_r($_POST['nome']);*/

        $user = $_POST['usuario'];
        $email = $_POST['email'];
        $password = $_POST['senha'];

        $query = "INSERT INTO avaliacao(nota, comentario) VALUES (NULL, NULL)";
        mysqli_query($conn, $query);
        $avaliacao_id = mysqli_insert_id($conn);
        
        $result = mysqli_query($conn, "INSERT INTO login(user, email, senha, avaliacao_idavaliacao) VALUES ('$user', '$email', '$password', '$avaliacao_id')");        

    }
?>

    <div class="container">
        <div class="content">

            <div class="contentLogin">

                <div class="villa">
                    <img src="../img/villa.png" alt="Foto Villasanti, jogador do Grêmio">
                </div>

                <div class="login">
                    <h2 class="title">Login</h2>
                    <form action="login.php" method="post" class="fLogin">
                        <label for="flUsuario">Usuário:</label>
                        <input type="text" name = "usuario" placeholder = "Digite seu Usuário" required>
                        <label for="flSenha">Senha:</label>
                        <input type="password" name = "senha" placeholder = "Digite sua Senha" required>
                        <button type = "submit" name = "submit" class = "btn btn-entrar">Entrar</button>
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
                    <form action="login.php" method="post" class="fCadastro" required>
                        <label for="fcEmail">Email:</label>
                        <input type="email" name = "email" placeholder = "Digite seu Email" required>
                        <label for="fcUsuario">Usuário:</label>
                        <input type="text" name = "usuario" placeholder = "Digite seu Usuário" required>
                        <label for="fcSenha">Senha:</label>
                        <input type="password" name = "senha" placeholder = "Digite sua Senha" required>
                        <button type = "submit" name = "submit" class = "btn btn-cadastrar">Cadastrar</button>
                    </form>
                    <p>Já tem conta?<a id="btnLogin" href="#"><u>Entre</u></a></p>
                </div>
            </div>
        </div>
    </div>

<?php
include_once '../footer/footer.php'; 
?>