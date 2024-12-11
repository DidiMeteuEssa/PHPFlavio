<link rel="stylesheet" href="styles.css">

<script>
    function validarAlterarFilme(id){
       const generoLista = document.getElementById("generoLista"+id).value;
       const anoLista = document.getElementById("anoLista"+id).value;
       const nomeLista = document.getElementById("nomeLista"+id).value;

       if(nomeLista == ''){
            alert("Digite o nome do filme!");
            return false;
       }
       
       if(anoLista == ''){
            alert("Selecione o ano do filme!");
            return false;
       }

       if(generoLista == ''){
            alert("Selecione um gênero!");
            return false;
       }

       return true;
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
            <form action="gerenciarFilme.php" method="post" onsubmit="return validarAlterarFilme('<?= $rowListar['id']; ?>')">
                <input type="hidden" name="idFilmeLista" value="<?= $rowListar['id']; ?>">
                <td class="itens2">
                    <input type="text" id="nomeLista<?= $rowListar['id']; ?>" name="nomeLista" value="<?= $rowListar['nome']; ?>">
                </td>
                <td class="itens2">
                    <input type="text" id="anoLista<?= $rowListar['id']; ?>" name="anoLista" value="<?= $rowListar['ano']; ?>">
                </td>

                <td><select name="generoLista" id="generoLista<?= $rowListar['id']; ?>">
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