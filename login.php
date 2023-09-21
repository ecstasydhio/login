<?php
require_once("conexao.php");
// Iniciar sessão 
session_start ();
//Verifique se os campos 'nome' e 'senha' foram enviados
if(isset($_POST['nome']) && isset($_POST['senha'])) {
    // simule uma validacao simples 
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // verifique se o nome usuario e senha correspondem 
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Autenticação bem-sucedida; redirecione para a pagina 'home'
    $_SESSION['usuario'] = $nome;
    header('Location: home.php');
    exit ();
    } else {
    // Autenticação falhou; redirecione de volta ao formulario de login
    header('location: index.php');
    exit ();
    }
}else {
    // Redirecione de volta ao formulario de login se os campos nao forem enuiados
    header('location: index.php');
    exit ();
}
?>