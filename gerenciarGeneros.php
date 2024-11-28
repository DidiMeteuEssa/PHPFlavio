
<?php

include("conexao.php");
$descricao = $_POST["descricao"];
$status = $_POST["statusGenero"];
$idGenero = $_POST["idGenero"];

if($descricao == ''){
    die("Insira o nome do gênero!");
}

if($status == ''){
    die("Selecione um status!");
} 

if($status == 2){
    $status = 0;
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

