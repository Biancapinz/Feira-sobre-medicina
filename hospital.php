<?php
session_start();
include_once './includes/conexao.php';
$pagina = 'hospital';
include_once './includes/header.php'; 

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];

$sql_hospital = "SELECT * FROM hospitais WHERE HospitalID = ?";
$stmt_hospital = mysqli_prepare($conexao, $sql_hospital);
mysqli_stmt_bind_param($stmt_hospital, "i", $id);
mysqli_stmt_execute($stmt_hospital);
$resultado_hospital = mysqli_stmt_get_result($stmt_hospital);
$hospital = mysqli_fetch_assoc($resultado_hospital);

if (!$hospital) {
    header("Location: index.php");
    exit;
}

$sql_comentarios = "SELECT c.Texto, c.Data, u.Usuario 
                    FROM comentarios AS c
                    JOIN usuarios AS u ON c.IDUsuario = u.ID
                    WHERE c.IDHospital = ?
                    ORDER BY c.Data DESC";

$stmt_comentarios = mysqli_prepare($conexao, $sql_comentarios);
mysqli_stmt_bind_param($stmt_comentarios, "i", $id);
mysqli_stmt_execute($stmt_comentarios);
$resultado_comentarios = mysqli_stmt_get_result($stmt_comentarios);
$comentarios = mysqli_fetch_all($resultado_comentarios, MYSQLI_ASSOC);

?>

<main class="container mt-5 pt-5">
    
    <h1 class="hospTitulo"><?php echo htmlspecialchars($hospital['Nome']); ?></h1>

    <div class="info-hospital" style="display: flex; flex-wrap: wrap; gap: 20px;"> 
        <div class="esq" style="flex: 1; min-width: 300px;">
            <img src="<?php echo htmlspecialchars($hospital['Foto']); ?>" alt="Foto de <?php echo htmlspecialchars($hospital['Nome']); ?>" style="width: 100%; border-radius: 8px;">
            <h3 style="margin-top: 15px;">Endereço</h3>
            <p><?php echo htmlspecialchars($hospital['Endereco']); ?></p>   
        </div>
        <div class="dir" style="flex: 2; min-width: 300px;">
            <h3>Infraestrutura</h3>
            <p><?php echo nl2br(htmlspecialchars($hospital['Infraestrutura'])); ?></p>     
            <h3>Atendimento</h3> 
            <p><?php echo nl2br(htmlspecialchars($hospital['Atendimento'])); ?></p>        
        </div>
    </div>
      
    <div class="comment-box" style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
        <h3>Deixe um Comentário</h3>
        <?php if (isset($_SESSION['id'])):?>
            <form id="comment-form" method="POST" action="back/comentario.php">
                <input type="hidden" name="id_hospital" value="<?php echo $hospital['HospitalID']; ?>">
                <textarea name="comment" id="comment-text" placeholder="Escreva seu comentário aqui..." required></textarea>
                <button type="submit">Enviar Comentário</button>
            </form>
        <?php else:?>
            <p>Você precisa <a href="login.php">fazer login</a> para poder comentar.</p>
        <?php endif; ?>
    </div>

    <div class="secao-comentarios-existentes">
        <h3>Comentários Recentes</h3>
        <?php if (empty($comentarios)): ?>
            <p class="sem-comentarios">Ainda não há comentários. Seja o primeiro a avaliar!</p>
        <?php else:?>
            <?php foreach ($comentarios as $comentario): ?>
                <div class="comentario-item">
                    <div class="comentario-meta">
                        <span class="comentario-usuario"><?php echo htmlspecialchars($comentario['Usuario']); ?></span>
                        <span class="comentario-data"><?php echo date('d/m/Y H:i', strtotime($comentario['Data'])); ?></span>
                    </div>
                    <p class="comentario-texto"><?php echo nl2br(htmlspecialchars($comentario['Texto'])); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <div style="margin-top: 30px;">
        <a href="./index.php" class="button">← Voltar para a lista de hospitais</a>
    </div>

</main>

<?php
include_once './includes/footer.php';
?>