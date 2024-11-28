<script>
        // Função para validar o CPF
        function validarCPF(cpf) {
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
        function validarSenha(senha) {
            return (
                senha.length >= 6 &&
                /[A-Z]/.test(senha) && // Pelo menos uma letra maiúscula
                /[a-z]/.test(senha) && // Pelo menos uma letra minúscula
                /[0-9]/.test(senha) && // Pelo menos um número
                /[\W_]/.test(senha)    // Pelo menos um caractere especial
            );
        }

        // Função para validar o formulário
        function validarFormulario() {

            const cpf = document.getElementById("cpf").value;
            const senha = document.getElementById("senha").value;

            if (!validarCPF(cpf)) {
                alert("CPF inválido!");
                return false;
            }
            if (!validarSenha(senha)) {
                alert("Senha inválida! Deve conter pelo menos 6 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.");
                return false;
            }
            return true;
        }
    </script>

<form method="post" action="cadastrar.php" onsubmit="return validarFormulario()">
    <table class="form-table">
        <tr>
            <td><label for="nome">Nome:</label></td>
            <td><input type="text" id="nome" name="nome" placeholder="Digite o nome"></td>
        </tr>
        <tr>
            <td><label for="cpf">CPF:</label></td>
            <td><input type="text" id="cpf" name="cpf" placeholder="Digite o CPF"></td>
        </tr>
        <tr>
            <td><label for="senha">Senha:</label></td>
            <td><input type="password" id="senha" name="senha" placeholder="Digite a senha"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><button type="submit">Enviar</button></td>
        </tr>
    </table>
</form>