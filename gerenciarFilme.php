
<?php

include("conexao.php");
$nome = $_POST["nome"];
$ano = $_POST["ano"];
$genero = $_POST["genero"];
$idFilme = $_POST["idFilme"];


$sql = "UPDATE filmes SET nome = ?,
                            ano = ?,
                            genero = ?
        where id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("siii", $nome, $ano, $genero, $idFilme);
    $stmt->execute();
    
    header("Location: filmes.php");
}

