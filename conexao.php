<?php
    $servername = "localhost";
    $database = "usuario";
    $username = "root";
    $password = "";
    // Cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Verifica conexão
    if (!$conn) {
        die("A conexão falhou: " . mysqli_connect_error());
    }
?>