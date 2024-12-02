<?php
include_once '../configuracao.php';
include_once '../header/header.php'; 
include_once '../database/conexao.php';

$errorMessage = ""; 
$successMessage = ""; 

$user = $name = $email = $password = "";

if (isset($_POST['submit'])) {
    $user = $_POST['usuario'];
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $checkQuery = "SELECT * FROM login WHERE user = '$user' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $errorMessage = "Email '$email' e/ou Usuário '$user' já está cadastrado!";
    } else {
        $query = "INSERT INTO avaliacao(nota, comentario) VALUES (NULL, NULL)";
        mysqli_query($conn, $query);
        $avaliacao_id = mysqli_insert_id($conn);

        $result = mysqli_query($conn, "INSERT INTO login(user, nome, email, senha, avaliacao_idavaliacao) 
                                       VALUES ('$user', '$name', '$email', '$password', '$avaliacao_id')");

        if ($result) {
            $successMessage = "Conta criada com sucesso!";
            $user = $name = $email = $password = ""; 
        } else {
            $errorMessage = "Erro ao criar conta. Tente novamente.";
        }
    }
}

?>

    <div class="container">
        <div class="content">

        <?php if (!empty($errorMessage)): ?>
            <script>
                alert("<?php echo $errorMessage; ?>");
            </script>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <script>
                alert("<?php echo $successMessage; ?>");
            </script>
        <?php endif; ?>

            <div class="contentLogin">

                <div class="villa">
                    <img src="../img/villa.png" alt="Foto Villasanti, jogador do Grêmio">
                </div>

                <div class="login">
                    <h2 class="title">Login</h2>
                    <form action="testelogin.php" method="post" class="fLogin">
                        <label for="flUsuario">Usuário:</label>
                        <input type="text" name="usuario" placeholder="Digite seu Usuário" required>
                        <label for="flSenha">Senha:</label>
                        <div style="position: relative;">
                            <input type="password" id="passwordLogin" name="senha" placeholder="Digite sua Senha" required>
                            <button type="button" id="togglePasswordLogin">
                                <i class="fa-solid fa-eye" id="iconToggleLogin"></i>
                            </button>
                        </div>
                        <button type="submit" name="submit" class="btn btn-entrar">Entrar</button>
                    </form>
                    <p>Ainda não tem conta? <a id="btnCadastro" href="#"><u>Cadastre-se</u></a></p>
                </div>
            </div>

            <div class="contentCadastro">

                <div class="alanpa">
                    <img src="../img/alanpapreto.png" alt="Foto Alan Patrick, jogador do Internacional">
                </div>

                <div class="cadastro">
                    <h2 class="title">Cadastre-se</h2>
                        <form action="login.php" method="post" class="fCadastro">
                            <label for="fcEmail">Email:</label>
                            <input type="email" name="email" placeholder="Digite seu Email" value="<?php echo htmlspecialchars($email); ?>" required>
                            <label for="fcNome">Nome:</label>
                            <input type="text" name="nome" placeholder="Digite seu Nome" value="<?php echo htmlspecialchars($name); ?>" required>
                            <label for="fcUsuario">Usuário:</label>
                            <input type="text" name="usuario" placeholder="Digite seu Usuário" value="<?php echo htmlspecialchars($user); ?>" required>
                            <label for="fcSenha">Senha:</label>
                            <div style="position: relative;">
                                <input type="password" id="passwordCadastro" name="senha" placeholder="Digite sua Senha" required>
                                <button type="button" id="togglePasswordCadastro">
                                    <i class="fa-solid fa-eye" id="iconToggleCadastro"></i>
                                </button>
                            </div>
                            <button type="submit" name="submit" class="btn btn-cadastrar">Cadastrar</button>
                        </form>
                    <p>Já tem conta? <a id="btnLogin" href="#"><u>Entre</u></a></p>
                </div>
            </div>
        </div>
    </div>
<script src="login.js"></script>
<?php
include_once '../footer/footer.php'; 
?>