<?php
include '../infra/conexao.php';

if (!isset($_POST['id'])) {
    die("ID não informado.");
}
$id = $_POST['id'];

$sql = "DELETE FROM brinquedos WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Brinquedo excluído com sucesso!";
    echo "<button onclick=\"window.location.href='../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir brinquedo: " . $stmt->error;
}
$stmt->close();
?>