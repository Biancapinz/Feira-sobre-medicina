<!-- ... trecho PHP antes do HTML ... -->

<?php
session_start();

// === CONEXÃO COM O BANCO ===
$conn = new mysqli('localhost', 'root', 'sua_senha', 'acessibilidadenamed');
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// === LOGIN COM VERIFICAÇÃO SEGURA ===
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
        } else {
            echo "<p style='color:red'>❌ Senha incorreta.</p>";
        }
    } else {
        echo "<p style='color:red'>❌ Usuário não encontrado.</p>";
    }
}

// === ENVIO DE COMENTÁRIO ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['comentar'])) {
    if (isset($_SESSION['id'])) {
        $comentario = $_POST['comentario'];
        $idhospital = $_POST['idhospital'];

        $sql = "INSERT INTO comentarios (IDUsuario, IDHospital, Texto) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $_SESSION['id'], $idhospital, $comentario);
        $stmt->execute();

        echo "<p style='color:green'>✅ Comentário enviado com sucesso!</p>";
    } else {
        echo "<p style='color:red'>⚠️ Faça login para comentar.</p>";
    }
}
?>

<!-- ... HTML até a parte do formulário ... -->

<?php if (!isset($_SESSION['id'])): ?>
  <h2>Login</h2>
  <form method="post">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit" name="login">Entrar</button>
  </form>
<?php else: ?>
  <h2>Olá, <?php echo $_SESSION['nome']; ?>!</h2>
  <form method="post">
    <label>Hospital:</label>
    <select name="idhospital" required>
      <?php
      $hospitais = $conn->query("SELECT HospitalID, Nome FROM hospitais");
      while ($h = $hospitais->fetch_assoc()) {
        echo "<option value='{$h['HospitalID']}'>{$h['Nome']}</option>";
      }
      ?>
    </select>
    <label>Comentário:</label>
    <textarea name="comentario" rows="4" required></textarea>
    <button type="submit" name="comentar">Enviar Comentário</button>
  </form>
<?php endif; ?>
