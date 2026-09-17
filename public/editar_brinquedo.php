<?php

include '../infra/conexao.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}
$id = $_GET['id'];

$sql = "SELECT * FROM brinquedos WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$brinquedo = $result->fetch_assoc();
$stmt->close();

if (!$brinquedo) {
    die("Brinquedo não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE brinquedos SET categoria = ?, faixa_etaria = ?, preco = ?, quantidade = ? WHERE id = ?";
    $stmt2 = $conexao->prepare($sql);
    $stmt2->bind_param("sidii", $categoria, $faixa_etaria, $preco, $quantidade, $id);

    if ($stmt2->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao atualizar brinquedo: " . $stmt2->error;
    }

    $stmt2->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Brinquedo</title>
</head>
<body>
    <h2>Editar Brinquedo</h2>
    <form method="POST" action="">
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($brinquedo['categoria']); ?>" required><br><br>

        <label for="faixa_etaria">Faixa Etária:</label>
        <input type="number" id="faixa_etaria" name="faixa_etaria" value="<?php echo $brinquedo['faixa_etaria']; ?>" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $brinquedo['preco']; ?>" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $brinquedo['quantidade']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
    <br>
    <button type="button" onclick="window.location.href='../index.php'">Voltar</button>
</body>
</html>