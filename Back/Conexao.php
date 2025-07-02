<?php
session_start();

// ======================
// CONEXÃO COM O BANCO
// ======================
$host = 'localhost';
$user = 'root';
$senha = 'sua_senha';
$banco = 'acessibilidadenamed';
$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// ======================
// LOGIN
// ======================
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($user = $resultado->fetch_assoc()) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['id'] = $user['ID'];
            $_SESSION['nome'] = $user['Usuario'];
            echo "<p>✅ Login bem-sucedido! Olá, " . $_SESSION['nome'] . "</p>";
        } else {
            echo "<p>❌ Senha incorreta.</p>";
        }
    } else {
        echo "<p>❌ Usuário não encontrado.</p>";
    }
}

// ======================
// COMENTÁRIO
// ======================
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['comentario'])) {
    if (isset($_SESSION['id'])) {
        $comentario = $_POST['comentario'];
        $usuario_id = $_SESSION['id'];

        $sql = "INSERT INTO comentarios (usuario_id, texto) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $usuario_id, $comentario);
        $stmt->execute();

        echo "<p>✅ Comentário enviado!</p>";
    } else {
        echo "<p>⚠️ Você precisa estar logado para comentar.</p>";
    }
}
?>

<!-- ====================== -->
<!-- HTML / INTERFACE      -->
<!-- ====================== -->

<main class="container">
    <?php if (!isset($_SESSION['id'])): ?>
        <h2>Login</h2>
        <form method="post">
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            <label>Senha:</label><br>
            <input type="password" name="senha" required><br>
            <button type="submit" name="login">Entrar</button>
        </form>
    <?php else: ?>
        <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
        <form method="post">
            <label>Comentário:</label><br>
            <textarea name="comentario" required></textarea><br>
            <button type="submit">Enviar Comentário</button>
        </form>
    <?php endif; ?>
</main>
