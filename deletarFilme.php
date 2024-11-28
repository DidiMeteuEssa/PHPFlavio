<?php
include("conexao.php");

$idFilme = $_POST["idFilme"];

$sql = "delete from filmes where id = ?";

$stmt = $conn->prepare($sql);

if($stmt){
    $stmt->bind_param("i", $idFilme);
    if(!$stmt->execute()){
        die("erro ao deletar");
    } 
} else {
    die("erro ao deletar");
}
header("Location: filmes.php");

?>

