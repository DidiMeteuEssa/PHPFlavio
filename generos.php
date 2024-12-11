<!DOCTYPE html>
<?php
include("valida.php");
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gêneros</title>
</head>


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