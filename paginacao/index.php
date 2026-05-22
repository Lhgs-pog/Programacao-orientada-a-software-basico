<?php
// Simulação de conexão com o banco de dados (ajuste com suas credenciais)
try {
    $pdo = new PDO('mysql:host=db;dbname=dashboard_bi', 'bi_user', 'bi_password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// 1. Captura da Página Atual: Lê o parâmetro GET 'pagina'[cite: 9].
// Se a URL não tiver esse parâmetro, assume a página 1[cite: 10].
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Trava de segurança para não existir página 0 ou negativa
if ($pagina < 1) {
    $pagina = 1;
}

// 2. Lógica Matemática: Exibir apenas 5 jogadores por página[cite: 8].
$limite = 5;

// Calcula o OFFSET (quantos registros pular) [cite: 11]
// Ex: Página 1 = (1 - 1) * 5 = Pula 0
// Ex: Página 2 = (2 - 1) * 5 = Pula 5
$offset = ($pagina - 1) * $limite;

// 3. Comandos SQL: Utiliza LIMIT e OFFSET para fatiar o resultado[cite: 11].
$sql = "SELECT id, nome, pontuacao FROM jogadores LIMIT :limite OFFSET :offset";
$stmt = $pdo->prepare($sql);

// O bindValue garante que os valores sejam tratados como inteiros, evitando SQL Injection
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$jogadores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Carrega a view passando as variáveis para renderizar a tela
require 'index_view.php';
?>