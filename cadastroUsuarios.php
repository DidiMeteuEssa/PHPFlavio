<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
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
               
            <?php
                include("formCadastrar.php");
                include("listar.php");
                ?>

            </div>
        </div>
    </div>

</body>

</html>