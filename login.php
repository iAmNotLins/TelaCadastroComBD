<?php
require_once 'cookie.php'; 
require_once 'session.php';
require_once 'db_config.php';

SessionManager::startSession();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $email = $_POST["email"];
        $password = $_POST["senha"];

        // Consulta SQL para verificar o usuário
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta SQL: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verificação da senha, se está usando hash
            if (password_verify($password, $user['senha'])) {
                SessionManager::setSessionValue('logado', true);
                header("Location: main.php?login=success");
                exit;
            } else {
                header("Location: index.php?login=failed");
                exit;
            }
        } else {
            header("Location: index.php?login=failed");
            exit;
        }
    } else {
        header("Location: index.php?login=failed");
        exit;
    }
}
?>


