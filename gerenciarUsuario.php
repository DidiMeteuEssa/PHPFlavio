
<?php

include("conexao.php");
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$cpfAnterior = $_POST["cpfAnterior"];

include("validacoes.php");

$sql = "UPDATE usuarios SET cpf = ?,
                            senha = ?,
                            nome = ?
        where cpf = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $cpf, $senha, $nome, $cpfAnterior);
    $stmt->execute();
    
    header("Location: cadastroUsuarios.php");
}

