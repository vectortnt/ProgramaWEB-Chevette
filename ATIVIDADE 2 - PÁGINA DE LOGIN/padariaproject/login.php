<?php
// Configuração de login pré-definido (apenas para teste)
$usuario_correto = 'West';
$senha_correta = '123456';

// Obtendo os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verificando se o login e senha estão corretos
if ($username === $usuario_correto && $password === $senha_correta) {
    echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($username) . "!";
} else {
    echo "Usuário ou senha incorretos.";
}
?>
