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



<?php

include("conexao.php");
$sql = "select * from generos";
$resultado = $conn->query($sql);

if (!$resultado = $conn->query($sql)) {
    die("erro");
}
?>

<table class="listar">
    <tr class="borda">
        <th class="itens">Descrição</th>
        <th class="itens">Status</th>
        <th class="itens" colspan="2">Funções</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
        <tr class="borda">
            <form action="gerenciarGeneros.php" method="post" onsubmit="return validarAlterarGenero('<?= $row['id']; ?>')">
                <input type="hidden" name="idGenero" value="<?= $row['id']; ?>">
                <td class="itens2">
                    <input type="text" id="descricaoGen<?= $row['id']; ?>" name="descricao" value="<?= $row['descricao']; ?>">
                </td>
                <td><select name="statusGenero" id = "statusGeneroOpt<?= $row['id']; ?>">
                        <option value="">Selecione um Status</option>
                        <option value="1" <?= $row['status'] == 1 ? 'selected' : ''; ?>>Ligado</option>
                        <option value="2" <?= $row['status'] == 0 ? 'selected' : ''; ?>>Desligado</option>
                    </select></td>
                </td>
                <td class="itens2">
                    <button type="submit" name="acao" value="alterar">Alterar</button>
                </td>
            </form>
        </tr>
    <?php } ?>
</table>