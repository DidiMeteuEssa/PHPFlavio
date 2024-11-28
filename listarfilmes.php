<style>
    .itens {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .table-container {
        max-height: 400px;
        overflow-y: auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .listar {
        width: 50%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .itens,
    .itens2 {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .itens {
        background-color: #0A0078;
        color: white;
        font-weight: bold;
    }

    .borda:hover {
        background-color: #f1f1f1;
    }

    .listar input[type="text"],
    .listar input[type="password"] {
        width: calc(100% - 10px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .listar input[type="text"]:focus,
    .listar input[type="password"]:focus {
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

    .eye-icon {
        cursor: pointer;
        margin-left: 10px;
    }

    .eye-icon img {
        width: 20px;
        height: 20px;
    }
</style>

<script>
    function mensagem(){
        alert("Filme deletado!");
    }
</script>

<?php

include("conexao.php");
$sqlListar = "select f.id, f.nome, f.ano, f.genero, g.descricao as desc_genero 
        from filmes f
        join generos g on (g.id=f.genero)";
$resultadoListar = $conn->query($sqlListar);

if (!$resultadoListar = $conn->query($sqlListar)) {
    die("erro");
}
?>

<table class="listar">
    <tr class="borda">
        <th class="itens">Nome</th>
        <th class="itens">Ano</th>
        <th class="itens">Gênero</th>
        <th class="itens" colspan="2">Funções</th>
    </tr>
    <?php while ($rowListar = $resultadoListar->fetch_assoc()) { ?>
        <tr class="borda">
            <form action="gerenciarFilme.php" method="post">
                <input type="hidden" name="idFilme" value="<?= $rowListar['id']; ?>">
                <td class="itens2">
                    <input type="text" name="nome" value="<?= $rowListar['nome']; ?>">
                </td>
                <td class="itens2">
                    <input type="text" name="ano" value="<?= $rowListar['ano']; ?>">
                </td>

                <td><select name="genero">
                        <option value="">Selecione um Gênero</option>
                        <?php
                        include("conexao.php");
                        $sqlGenero = "select * from generos where status=1";
                        if (!$resultadoGenero = $conn->query($sqlGenero)) {
                            die("erro");
                        }
                        while ($rowGenero = $resultadoGenero->fetch_assoc()) {
                        ?>
                            <option value="<?= $rowGenero['id']; ?>" <?= ($rowGenero['id'] == $rowListar['genero']) ? 'selected' : ''; ?>> <?= $rowGenero['descricao']; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
                <td class="itens2">
                    <button type="submit" name="acao" value="alterar">Alterar</button>
                </td>
            </form>
            <form action="deletarFilme.php" method="post" onsubmit="return mensagem()">
                <input type="hidden" name="idFilme" value="<?= $rowListar['id']; ?>">
                <td class="itens2">
                    <button type="submit" value="deletar">Deletar</button>
                </td>
            </form>
        </tr>
    <?php } ?>
</table>