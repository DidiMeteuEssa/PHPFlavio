<?php
include("conexao.php");

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

// Função para validar o CPF
include("validacoes.php");

// Se as validações passarem, insere no banco de dados
$sql = "INSERT INTO `usuarios` (`cpf`, `nome`, `senha`) VALUES (?, ?, ?);";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $cpf, $nome, $senha);
    $stmt->execute();
    header("Location: cadastroUsuarios.php");
} else {
    echo "Erro ao cadastrar usuário.";
}
?>
