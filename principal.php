<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <title>Principal</title>
</head>


<body>
    <div class="main-container">
        <div class="cabecalho">
            <span class="ola">Olá, <?= $_SESSION['nome']; ?>!</span>
            <a href="sair.php" class="sair">Sair</a>
        </div>
        <div class="menu-conteudo">
            <div class="menu-left">
                <a href="principal.php" class="text-menu">Inicio</a><br>
                <a class="text-menu" href="cadastroUsuarios.php">Cadastrar Usuario </a><br>
                <a href="generos.php" class="text-menu">Gêneros</a><br>
                <a href="filmes.php" class="text-menu">Filmes</a><br>
                <a href="#" class="text-menu">Lebron James</a><br>
            </div>
            <div class="menu-right">
                ⎓ᔑ⨅ 𝙹 ꖎ
                <img src="https://www.brasil247.com/_next/image?url=https%3A%2F%2Fcdn.brasil247.com%2Fpb-b247gcp%2Fswp%2Fjtjeq9%2Fmedia%2F20240709050736_96a5a2864399666fa4f8a39fe970d12aafcc3cbbe29cb6948724792ce7268407.webp&w=3840&q=75" width="650px" alt="">
            </div>
        </div>
    </div>
</body>

</html>