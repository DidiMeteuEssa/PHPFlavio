<?php
include("conexao.php");

$genero = $_POST["nomeGenero"];
$status = $_POST["statusGenero"];

if($genero == ''){
    die("Insira o nome do gênero!");
}

$sql = "INSERT INTO `generos` (`descricao`, `status`) VALUES (?, ?);";

$stmt = $conn->prepare($sql);

if($stmt){
    $stmt->bind_param("si", $genero, $status);
    if(!$stmt->execute()){
        die("erro ao inserir");
    } 
} else {
    die("erro ao inserir");
}
header("Location: generos.php");

?>