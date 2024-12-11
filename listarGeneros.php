<link rel="stylesheet" href="styles.css">

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