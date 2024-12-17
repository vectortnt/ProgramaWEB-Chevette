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

// Verificando se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Atualizando os dados no banco de dados
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }
}

// Fechando a conexão
$conn->close();
?>