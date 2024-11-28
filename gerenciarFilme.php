
<?php

include("conexao.php");
$nome = $_POST["nome"];
$ano = $_POST["ano"];
$genero = $_POST["genero"];
$idFilme = $_POST["idFilme"];

if($genero == ""){
    die("Insira um gênero!");
}

if($nome == ''){
    die("Insira o nome para o filme!");
}

if($ano == ''){
    die("Insira o ano para o filme!");
}

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

