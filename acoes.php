<?php
require_once ("conexao.php");
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
        $id = $_GET['id'];
        $sql = "DELETE FROM usuarios WHERE id= $id";
        $del = $conn->prepare($sql);
        $del->execute();
        header ('Location:home.php');
    }else {
        echo "Erro.";
    }
?>