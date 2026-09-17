<?php

include '..infra/conexao.php';

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