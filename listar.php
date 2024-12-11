<?php

include("conexao.php");
$sql = "select * from usuarios";
$resultado = $conn->query($sql);

if (!$resultado = $conn->query($sql)) {
    die("erro");
}
?>

<link rel="stylesheet" href="styles.css">



<script>
    function togglePassword(cpf) {
        var senhaInput = document.getElementById('senha-' + cpf);
        if (senhaInput.type === 'password') {
            senhaInput.type = 'text';
        } else {
            senhaInput.type = 'password';
        }
    }

    // Função para validar o CPF
    function validarCPFLista(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

        let soma = 0;
        for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
        let resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(9))) return false;

        soma = 0;
        for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        return resto === parseInt(cpf.charAt(10));
    }

    // Função para validar a senha
    function validarSenhaLista(senha) {
        return (
            senha.length >= 6 &&
            /[A-Z]/.test(senha) && // Pelo menos uma letra maiúscula
            /[a-z]/.test(senha) && // Pelo menos uma letra minúscula
            /[0-9]/.test(senha) && // Pelo menos um número
            /[\W_]/.test(senha) // Pelo menos um caractere especial
        );
    }

    // Função para validar o formulário
    function validarFormularioLista(cpf) {

        const cpf2 = document.getElementById("cpf" + cpf).value;
        const senha = document.getElementById("senha-" + cpf).value;

        if (!validarCPFLista(cpf2)) {
            alert("CPF Inválido!");
            return false;
        }
        if (!validarSenhaLista(senha)) {
            alert("Senha inválida! Deve conter pelo menos 6 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.");
            return false;
        }
        return true;
    }
    function mensagem(){
        alert("Usuario deletado!");
    }
</script>

<table class="listar">
    <tr class="borda">
        <th class="itens">Nome</th>
        <th class="itens">CPF</th>
        <th class="itens">Senha</th>
        <th class="itens" colspan="2">Funções</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
        <tr class="borda">
            <form action="gerenciarUsuario.php" method="post" onsubmit="return validarFormularioLista('<?= $row['cpf']; ?>')">
                <input type="hidden" name="cpfAnterior" value="<?= $row['cpf']; ?>">
                <td class="itens2">
                    <input type="text" name="nome" value="<?= $row['nome']; ?>">
                </td>
                <td class="itens2">
                    <input id="cpf<?= $row['cpf']; ?>" type="text" name="cpf" value="<?= $row['cpf']; ?>">
                </td>
                <td class="itens2">
                    <div style="display: flex; align-items: center;">
                        <input type="password" id="senha-<?= $row['cpf']; ?>" name="senha" value="<?= $row['senha']; ?>">
                        <span class="eye-icon" onclick="togglePassword('<?= $row['cpf']; ?>')">
                            <img src="eye-icon.png" alt="Mostrar senha">
                        </span>
                    </div>
                </td>
                <td class="itens2">
                    <button type="submit" name="acao" value="alterar">Alterar</button>
                </td>
            </form>
            <form action="deletar.php" method="post" onsubmit="return mensagem()">
                <input type="hidden" name="cpf" value="<?= $row['cpf']; ?>">
                <td class="itens2">
                    <button type="submit" value="deletar">Deletar</button>
                </td>
            </form>
        </tr>
    <?php } ?>
</table>