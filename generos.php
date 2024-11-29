<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gêneros</title>
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
        padding-top: 40px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-direction: column;
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

    .form-table {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        margin: auto;
    }

    .form-table label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-table input[type="text"],
    .form-table input[type="password"] {
        width: calc(100% - 10px);
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form-table input[type="text"]:focus,
    .form-table input[type="password"]:focus {
        border-color: #007BFF;
        outline: none;
    }

    button {
        background-color: #0A0078;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    select {
        width: calc(100% - 10px);
        padding: 8px;

        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    select:focus {
        border-color: #007BFF;
        outline: none;
    }
</style>

<script>
    function validarCadastroGenero() {

        const nGenero = document.getElementById('nomeGenero').value;

        if (nGenero == '') {
            alert("Insira o nome do gênero");
            return false;
        }

        
    }

    function validarAlterarGenero(id) {
            const statusGen = document.getElementById("statusGeneroOpt"+id).value;;
            const descricaoGen = document.getElementById("descricaoGen"+id).value;

            if (descricaoGen == '') {
                alert("Digite uma descricao!");
                return false;
            }
            

            if (statusGen == '') {
                alert("Selecione um status!");
                return false;
            }

            return true;
        }
    
    function alterarStatus() {
        const statusButton = document.getElementById('statusGenero');
        const statusInput = document.getElementById('statusInput');

        if (statusInput.value === "1") {
            statusButton.innerHTML = "Desativado";
            statusInput.value = "0";
        } else {
            statusButton.innerHTML = "Ativado";
            statusInput.value = "1";
        }
    }
</script>

<body>
    <div class="main-container">
        <div class="cabecalho">
            <span class="ola">Olá, <?= $_SESSION['nome']; ?>!</span>
            <a href="sair.php" class="sair">Sair</a>
        </div>
        <div class="menu-conteudo">
            <div class="menu-left">
                <a href="principal.php" class="text-menu">Início</a><br>
                <a class="text-menu" href="cadastroUsuarios.php">Cadastrar Usuário</a><br>
                <a href="generos.php" class="text-menu">Gêneros</a><br>
                <a href="filmes.php" class="text-menu">Filmes</a><br>
                <a href="#" class="text-menu">Lebron James</a><br>
            </div>
            <div class="menu-right">
                <form method="post" action="cadastrarGeneros.php" onSubmit="return validarCadastroGenero();">
                    <table class="form-table">
                        <tr>
                            <td><label for="nomeGenero">Gênero:</label></td>
                            <td><input type="text" id="nomeGenero" name="nomeGenero" placeholder="Digite o gênero"></td>
                        </tr>
                        <tr>
                            <td><label for="statusGenero">Status:</label></td>
                            <td>
                                <button type="button" id="statusGenero" onclick="alterarStatus()">Ativado</button>
                                <input type="hidden" name="statusGenero" id="statusInput" value="1">
                            </td>

                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center;"><button type="submit" style="margin-top: 20px;">Enviar</button></td>
                        </tr>
                    </table>
                </form>

                <?php
                include("listarGeneros.php");
                ?>
            </div>
        </div>
    </div>




</body>

</html>