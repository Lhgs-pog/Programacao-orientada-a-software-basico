<?php

require_once "Produto.php";

$produto = new Produto("Produto 1", 10);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["nome"]) && isset($_POST["preco"])) {
        if($_POST['preco'] < 0){
            echo 'Valor não pode ser negativo';
            exit;
        }
        $produto = new Produto($_POST["nome"], $_POST["preco"]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atv6</title>
</head>
<body>
    <h1>Produto</h1>
    <p>Nome: <?php echo $produto->getNome(); ?></p>
    <p>Preço: <?php echo $produto->getPreco(); ?></p>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $produto->getNome(); ?>">
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" value="<?php echo $produto->getPreco(); ?>">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>