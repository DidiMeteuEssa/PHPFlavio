
<?php
function validarCPF($cpf) {
    // Remover caracteres especiais
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verificação de dígitos iguais (casos como "111.111.111-11")
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

// Função para validar a senha
function validarSenha($senha) {
    // Critérios: mínimo 6 caracteres, 1 maiúscula, 1 minúscula, 1 número, 1 caractere especial
    if (strlen($senha) < 6) {
        return false;
    }
    if (!preg_match('/[A-Z]/', $senha)) { // Verifica se há pelo menos uma letra maiúscula
        return false;
    }
    if (!preg_match('/[a-z]/', $senha)) { // Verifica se há pelo menos uma letra minúscula
        return false;
    }
    if (!preg_match('/[0-9]/', $senha)) { // Verifica se há pelo menos um número
        return false;
    }
    if (!preg_match('/[\W]/', $senha)) { // Verifica se há pelo menos um caractere especial
        return false;
    }
    return true;
}

// Validações de CPF e senha
if (!validarCPF($cpf)) {
    echo "CPF inválido!";
    exit;
}

if (!validarSenha($senha)) {
    echo "Senha inválida! Deve conter pelo menos 6 caracteres, incluindo letras e números.";
    exit;
}
?>