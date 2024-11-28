<!DOCTYPE html>

<head>
    <title>Log-in</title>
</head>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url('https://img.freepik.com/vetores-gratis/selva-tropical-do-jogo-fundo-noite_105738-595.jpg?t=st=1726179691~exp=1726183291~hmac=b4fccb479d7ab70128b06b2d33f1a7ef5ce4304a0a22e73917fde53316822886&w=740');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .container-form {
        width: 500px;
        height: 500px;
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 71px -3px rgba(0, 0, 0, 0.75);
        color: white;
    }

    .form {
        display: flex;
        align-items: center;
        height: 80%;
        font-family: 'Oswald', sans-serif;
        font-size: 30px;
        justify-content: space-evenly;
    }

    .form-cabe {
        height: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Oswald', sans-serif;
        font-size: 70px;
    }

    .form-table {
        border-spacing: 15px 20px;
    }

    input {
        width: 288px;
        height: 50px;
        background: inherit;
        border-radius: 10px;
        border: inherit;
        box-shadow: 0px 0px 71px -3px rgba(0, 0, 0, 0.75);
        outline: none;
        color: #fff;
        padding: 5px;
        font-size: 18px;
    }

    input::placeholder {
        color: gainsboro;
        font-size: 18px;
    }

    button {
        width: 200px;
        height: 50px;
        background: inherit;
        border-radius: 10px;
        border: inherit;
        box-shadow: 0px 0px 71px -3px rgba(0, 0, 0, 0.75);
        outline: none;
        color: #fff;
        font-size: 18px;

    }

    button:hover {
        border: solid #fff 1px;
    }


    
</style>

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

<body>
    <div class="main-container">
        <div class="container-form">
            <div class="form-cabe"><b>Log-in</b></div>
            <div class="form">
                <form method="post" action="login.php" onsubmit="return validarFormulario()">
                    <table class="form-table">
                        <tr>
                            <td><label for="cpf">CPF:</label></td>
                            <td><input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF"></td>
                        </tr>
                        <tr>
                            <td><label for="senha">Senha:</label></td>
                            <td><input type="password" id="senha" name="senha" placeholder="Digite sua senha"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button type="submit">Enviar</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>