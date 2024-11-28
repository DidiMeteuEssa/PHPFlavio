
<?php

include("conexao.php");
$descricao = $_POST["descricao"];
$status = $_POST["statusGenero"];
$idGenero = $_POST["idGenero"];

if($status == ''){
    die("Selecione um status!");
} 

$sql = "UPDATE generos SET descricao = ?,
                            status = ?
        where id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sii", $descricao, $status,  $idGenero);
    $stmt->execute();
    
    header("Location: generos.php");
}

