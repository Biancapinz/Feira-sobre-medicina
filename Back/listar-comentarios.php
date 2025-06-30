<?php
include "Conexao.php";

$IDHospital = $_GET['IDHospital'];

$sql = "SELECT c.comentarioID, c.Texto, c.Data, u.Usuario,
                (SELECT COUNT(*) FROM likes l WHERE l.IDComentario = c.comentarioID) AS Likes
        FROM comentarios c
        JOIN usuarios u ON c.IDUsuario = u.ID
        WHERE c.IDHospital = ?
        ORDER BY c.Data DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $IDHospital);
$stmt->execute();
$result = $stmt->get_result();

$comentarios = [];
while ($row = $result->fetch_assoc()) {
    $comentarios[] = $row;
}

echo json_encode($comentarios);
?>
