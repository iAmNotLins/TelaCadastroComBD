
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<h1>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        require_once 'session.php';
        if (!SessionManager::getSessionValue('logado')) {
            header("Location: index.php");
            exit;
        }

        if (isset($_GET["login"]) && $_GET["login"] === "success") {
            echo "<script>alert('Login efetuado com sucesso');</script>";
        }
    ?>

    <h1>Conteudo principal quando estiver logado</h1>
</body>
</html>
