<?php
include("conexao.php");

$ano = $_POST["ano"];
$nome = $_POST["nome"];
$genero = $_POST["genero"];

if($genero == ''){
    die("Insira um gênero!");
}

if($nome == ''){
    die("Insira o nome para o filme!");
}

if($ano == ''){
    die("Insira o ano para o filme!");
}

$sql = "INSERT INTO `filmes` (`ano`, `nome`, `genero`) VALUES (?, ?, ?);";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("isi", $ano, $nome, $genero);
    if($stmt->execute()){
        header("Location: filmes.php");
        die;
    } else {
        echo "Erro ao cadastrar filme.";
    }
} else {
    echo "Erro ao cadastrar filme.";
}
?>
