<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <title>Cadastrar Filme</title>
</head>



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
                <a href="generos.php" class="text-menu">Gêneros</a><br>
                <a href="filmes.php" class="text-menu">Filmes</a><br>
                <a href="#" class="text-menu">Lebron James</a><br>
            </div>
            <div class="menu-right">


                <form method="post" action="cadastroFilmes.php" onsubmit="return validarCadastroFilme()">
                    <table class="form-table">
                        <tr>
                            <td><label for="ano">Ano:</label></td>
                            <td><input type="text" id="ano" name="ano" placeholder="Digite o ano do filme"></td>
                        </tr>
                        <tr>
                            <td><label for="nome">Nome:</label></td>
                            <td><input type="text" id="nome" name="nome" placeholder="Digite o nome do filme"></td>
                        </tr>
                        <tr>
                            <td><label for="genero">Genero:</label></td>
                            <td><select name="genero" id="genero">
                                <option value="">Selecione um Gênero</option>
                                <?php
                                include("conexao.php");
                                $sql = "select * from generos where status=1";
                                if(!$resultado = $conn->query($sql)){
                                    die("erro");
                                }
                                while($row = $resultado->fetch_assoc()){
                                    ?>
                                    <option value="<?=$row['id'];?>"><?=$row['descricao'];?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button  style="margin-top: 20px;" type="submit">Inserir</button></td>
                        </tr>
                    </table>
                </form>
                <?php
                    include("listarfilmes.php");
                ?>
            </div>
        </div>
    </div>

</body>

</html>