<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    // Configurações de conexão com o banco de dados
    $servername = "localhost";  // Geralmente localhost
    $username = "root";         // Usuário padrão do MySQL
    $password = "";             // Senha do MySQL, se houver
    $dbname = "meu_banco";      // Nome do banco de dados que você criou

    // Cria conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se houve erro na conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserir os dados
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, idade) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nome, $email, $idade); // "ssi" significa que os parâmetros são: string, string, inteiro

    // Executa a consulta
    if ($stmt->execute()) {
        echo "<h2>Dados cadastrados com sucesso!</h2>";
    } else {
        echo "<h2>Erro ao cadastrar os dados.</h2>";
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
