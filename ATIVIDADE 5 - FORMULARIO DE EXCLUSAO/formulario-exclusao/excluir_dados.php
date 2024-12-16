<?php
// excluir_dados.php

// Configurações do banco de dados
$host = "localhost";
$dbname = "nome_do_banco";
$username = "seu_usuario";
$password = "sua_senha";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM nome_da_tabela WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Registro com ID $id excluído com sucesso.";
        } else {
            echo "Erro ao excluir o registro.";
        }
    } else {
        echo "ID não fornecido.";
    }
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>