<?php

include '../infra/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM brinquedos WHERE id = ?";
$result = $conexao->prepare($sql);
$brinquedo = $result->fetch_assoc();

if(!$brinquedo) {
    die("Brinquedo não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE brinquedos SET categoria = '$categoria', faixa_etaria = '$faixa_etaria', preco = '$preco', quantidade = '$quantidade' WHERE id = '$id'";

     if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
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
        <input type="text" id="categoria" name="categoria" value="<?php echo $brinquedo['categoria']; ?>" required><br><br>

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

