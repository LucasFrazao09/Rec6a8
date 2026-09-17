<?php
$id = $_GET['id'];
include '../infra/conexao.php';

$sql = "DELETE FROM brinquedos WHERE id = $id";
if ($conexao->query($sql) === TRUE) {
    echo "Brinquedo excluído com sucesso!";
    echo "<button onclick=\"window.location.href='../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir brinquedo: " . $conexao->error;
}
?>