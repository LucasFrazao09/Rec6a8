<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Brinquedos</title>
</head>
<body>
    <h1>Loja de Brinquedos</h1>
    <p>Bem-vindo à loja do Frazão!</p>
        <button type="button" onclick="window.location.href='public/cadastrar_produto.php'">Cadastrar Produto</button>
    <br>

    <h2>Produtos Cadastrados</h2>
    <?php
    include 'infra/conexao.php';
    $sql = "SELECT * FROM brinquedos";
    $brinquedos = $conexao->query($sql);
    while ($brinquedo = $brinquedos->fetch_assoc()) {        
    ?>
       <tr>
            td><?php echo $brinquedo['id']; ?></td>
            <td><?php echo $brinquedo['categoria']; ?></td>
            <td><?php echo $brinquedo['faixa_etaria']; ?></td>
            <td><?php echo $brinquedo['preco']; ?></td>
            <td><?php echo $brinquedo['quantidade']; ?></td>
            <td>
                <form method="POST" action="public/excluir_brinquedo.php" onsubmit="return confirm('Tem certeza que deseja excluir este brinquedo?');">
                    <input type="hidden" name="id" value="<?php echo $brinquedo['id']; ?>">
                    <button type="submit">Excluir</button>
                </form>
        </tr>
        <?php } ?>
    </table>

    
</body>
</html>