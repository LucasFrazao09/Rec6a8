<?php

include '../infra/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $sql = "INSERT INTO brinquedos (categoria, faixa_etaria, preco, quantidade) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sidi", $categoria, $faixa_etaria, $preco, $quantidade);

    if ($stmt->execute()) {
        echo "Brinquedo cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar brinquedo: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Brinquedo</title>
</head>
<body>
    <h2>Cadastrar Brinquedo</h2>
    <form method="POST" action="">
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="faixa_etaria">Faixa Etária:</label>
        <input type="number" id="faixa_etaria" name="faixa_etaria" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
        <br>
        <button onclick="window.location.href='listar_brinquedos.php'">Voltar</button>
</body>
</html>
