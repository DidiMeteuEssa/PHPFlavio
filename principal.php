<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<style>
    body {
        margin: 0 auto;
        background-color: gray;
        padding: 0;
        overflow-x: hidden;
    }

    .main-container {
        display: flex;
        flex-direction: column;
    }

    .menu-conteudo {
        display: flex;
        flex-direction: row;
    }

    .cabecalho {
        min-height: 120px;
        width: 100%;
        background-color: #0A0078;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }

    .menu-left {
        width: 15%;
        min-height: 100vh;
        background-color: #ddd;
        float: left;
        padding-top: 20px;
    }

    .menu-right {
        width: 90%;
        min-height: 100vh;
        background-color: #f4f4f4;
        float: left;
        padding-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sair {
        margin-right: 40px;
        color: white;
        padding: 10px 21px;
        text-align: center;
        border-radius: 10px;
        font-family: 'Oswald', sans-serif;
        font-size: 25px;
        font-weight: 650;

    }

    .ola {
        margin-left: 30px;
        color: white;
        font-family: 'Oswald', sans-serif;
        font-size: 30px;
        font-weight: 800;
    }

    .sair:hover {
        background-color: #ddd;
        color: #0A0078;
    }


    .text-menu {
        margin-left: 10px;
        margin-right: 55px;
        text-decoration: none;
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        display: flex;
        padding-left: 7px;
        align-items: center;
        height: 40px;
        border-radius: 10px;
    }

    .text-menu:hover {
        color: white;
        background-color: #0A0078;
        height: 40px;
        border-radius: 10px;
        padding-left: 7px;
    }
</style>

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
                <a href="generos.php" class="text-menu">Generos</a><br>
                <a href="filmes.php" class="text-menu">Filmes</a><br>
                <a href="#" class="text-menu">Lebron James</a><br>
            </div>
            <div class="menu-right">
                <img src="https://www.brasil247.com/_next/image?url=https%3A%2F%2Fcdn.brasil247.com%2Fpb-b247gcp%2Fswp%2Fjtjeq9%2Fmedia%2F20240709050736_96a5a2864399666fa4f8a39fe970d12aafcc3cbbe29cb6948724792ce7268407.webp&w=3840&q=75" width="650px"  alt="">
            </div>
        </div>
    </div>
</body>

</html>