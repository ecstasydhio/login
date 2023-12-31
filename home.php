<?php
session_start();
// verificar se a sessão 'nome_usuaro' está definida 
if (!isset($_SESSION['usuario'])){
    //Se a sessão não estiver definida, rediecione para a página de login
    header('location: index.php');
    exit();
}

require_once("conexao.php");
$sql= "SELECT * FROM usuarios";
$usuarios= $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <class class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
             <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                    </li>
                </ul>
                <div class="d-flex">
                <span class= "form-control me-2">
                <?php
                    echo "Seja bem-vindo  ".$_SESSION['usuario'];
                ?>
                </span>
                <a href="sair.php" class="btn btn-dark">sair</a>
                </div>
             </div>
        </nav>
<!--Inicio do formulario-->
        <form action= "cadastra.php" class="container card p-5 m-5" method="post">
            <h1 class= "text-center"> Cadastrar novo usuario</h1>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                <label for="Senha" class="form-label">senha</label>
                <input type="password" name="senha" class="form-control" id="exampleFormControlInput1">
                </div>
                <button class= "btn btn-dark col-5"> Cadastrar</button>
    </div>
        </form> <!--Fim do formulario-->
        <table class="table table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        <?php
          // Usa foreach para percorrer os resultados
          foreach ($usuarios as $usuario) {
        ?>
    <tr>
      <td> <?php echo $usuario['id'];?></td>
      <td> <?php echo $usuario['nome'];?></td>
      <td><a href="acoes.php?acao=editar&id=<?php echo $usuario['id'];?>" class= "btn btn-dark">editar</a></td>
      <td><a  href="acoes.php?acao=excluir&id=<?php echo $usuario['id'];?>"" class= "btn btn-danger">excluir</a></td>
    </tr>

    <?php
          }
    ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>