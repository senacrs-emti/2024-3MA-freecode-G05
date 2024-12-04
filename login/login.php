<?php
include_once '../configuracao.php';
$pagina = 'login';
include_once '../header/header.php'; 
include_once '../database/conexao.php';

$errorMessage = ""; 
$successMessage = ""; 

$user = $name = $email = $password = "";
$isLogin = true;  // Flag para determinar se o formulário é de login ou cadastro

if (isset($_POST['acao'])) {
    
    if ( $_POST['acao'] == "login") {
        // Processo de Login
        $user = $_POST['usuario'];
        $password = $_POST['senha'];

        // Consultar o banco de dados para verificar se o usuário existe
        $checkQuery = "SELECT l.idlogin, l.user, l.senha, l.nome, p.idfoto, p.descricao, p.capa
                       FROM login l
                       JOIN perfil p ON l.idlogin = p.iduser
                       WHERE l.user = ?";

        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar se a senha está correta
            if ( md5($password) == $row['senha'] ) {
                // Iniciar sessão e salvar as variáveis de sessão
                session_start();
                $_SESSION['idlogin'] = $row['idlogin'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['senha'] = $row['senha'];
                $_SESSION['foto'] = $row['idfoto'];
                $_SESSION['descricao'] = $row['descricao'];
                $_SESSION['capa'] = $row['capa'];

                // Redirecionar para a página de perfil
                header("Location: ../main/index.php");
                exit;
            } else {
                $errorMessage = "Senha incorreta!";
            }
        } else {
            $errorMessage = "Usuário não encontrado!";
        }
    } elseif (isset($_POST['acao']) == "cadastro") {
        // Processo de Cadastro
        $user = $_POST['usuario'];
        $name = $_POST['nome'];
        $email = $_POST['email'];
        $password = md5($_POST['senha']); // Criptografar a senha

        // Verificar se o usuário ou email já existe
        $checkQuery = "SELECT * FROM login WHERE user = '$user' OR email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $errorMessage = "Email '$email' ou Usuário '$user' já está cadastrado!";
        } else {
            // Inserir a avaliação inicial (comentário vazio)
            $query = "INSERT INTO avaliacao(comentario) VALUES (NULL)";
            mysqli_query($conn, $query);
            $avaliacao_id = mysqli_insert_id($conn);

            // Inserir o novo usuário na tabela de login
            $query = "INSERT INTO login(user, nome, email, senha, avaliacao_idavaliacao) 
                      VALUES ('$user', '$name', '$email', '$password', '$avaliacao_id')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Criar o perfil do usuário (perfil básico)
                $idlogin = mysqli_insert_id($conn); // id do novo usuário
                $perfilQuery = "INSERT INTO perfil(iduser) VALUES ('$idlogin')";
                mysqli_query($conn, $perfilQuery);

                $successMessage = "Conta criada com sucesso! Faça login para acessar.";
                $user = $name = $email = $password = "";  // Limpar campos após cadastro
                $isLogin = true;  // Redefinir o formulário para login
            } else {
                $errorMessage = "Erro ao criar conta. Tente novamente.";
            }
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

</head>
<body>
    <div class="container">
        <div class="contentLogin">
            <div class="villa">
                <img src="../img/villa.png" alt="Foto Villasanti, jogador do Grêmio">
            </div>

            <div class="login">
                <h2 class="title">Login</h2>
                <form action="login.php" method="post" class="fLogin">
                    <input type="hidden" name="acao" value="login">
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
    </div>
</body>
</html>
            <div class="contentCadastro">

                <div class="alanpa">
                    <img src="../img/alanpapreto.png" alt="Foto Alan Patrick, jogador do Internacional">
                </div>

                <div class="cadastro">
                    <h2 class="title">Cadastre-se</h2>
                        <form action="login.php" method="post" class="fCadastro">
                        <input type="hidden" name="acao" value="cadastro">
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

<script src="login.js?t=<?php echo date("YmdHis").rand(1,9999);?>"></script>
<?php
include_once '../footer/footer.php'; 
?>