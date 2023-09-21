<?php
session_start();

//Remover a variavel de sessao 'usuario'
unset($_SESSION['usuario']);
//destruir sessão 
session_destroy();
// redirecionar para o index
header('location:index.php');
exit();
?>
