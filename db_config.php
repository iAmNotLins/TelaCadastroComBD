<?php
$servername = "localhost";
$username = "root";
$password = "L220522l..";
$dbname = "cadastro_login";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
