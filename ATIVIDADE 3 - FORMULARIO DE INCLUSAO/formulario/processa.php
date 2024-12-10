<?php
// Conectar ao banco de dados (substitua pelos seus dados de conexão)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meu_banco";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificando se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Preparando a consulta SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    // Executando a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Novo usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }
}

// Fechando a conexão
$conn->close();
?>