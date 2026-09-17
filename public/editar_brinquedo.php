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

