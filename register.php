<?php
require_once 'db_config.php'; // Inclua a configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["senha_confirm"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha_confirm = $_POST["senha_confirm"];

        if ($senha === $senha_confirm) {
            // Hash da senha
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
            
            // Inserção no banco de dados
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Erro ao preparar a consulta SQL: " . $conn->error);
            }
            $stmt->bind_param("sss", $nome, $email, $hashed_password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("Location: index.php?register=success");
                exit;
            } else {
                echo "Erro ao cadastrar o usuário.";
            }
        } else {
            echo "As senhas não coincidem.";
        }
    }
}
?>

