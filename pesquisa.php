<?php

require './config/conexao.php';

$conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysql_error());

// mysqli_select_db($conexao, DBNAME) || die(mysqli_error());
// $db_select = mysqli_select_db($conexao, DBNAME);
// if (!$db_select) {
//     die("Database, falha na conexão. " . mysqli_error($conexao));
// }
mysqli_select_db($conexao, DBNAME) or die(mysqli_error());
    session_start();
    if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
        header("Location: index.php");
        exit;
    } else {
        echo "<center>Você está logado</center>";
    }

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)) {
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, nome, email, celular, data_nascimento, status, foto FROM servidor';
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
} else {
    // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, nome, email, celular, status, foto FROM servidor WHERE nome LIKE :nome OR email LIKE :email 
    OR celular LIKE :celular';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $termo.'%');
    $stm->bindValue(':email', $termo.'%');
    $stm->bindValue(':celular', $termo.'%');
    $stm->execute();
    $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
}
?>
  <?php include './partials/header.php'; ?>

  <?php include './partials/menu_sidebar.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <title>Procon PB - (Pesquisa combustível))</title>

  <link href="./dist/css/bootstrap.min.css" rel="stylesheet" />

  <link href="./assets/css/dashboard.css" rel="stylesheet" />

</head>
<body>
  <?php include './partials/header.php'; ?>

  <?php include './partials/menu_sidebar.php'; ?>

  <div class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <?php $HeaderContext = 'Combustíveis'; ?>
      <?php include './partials/headercontext.php'; ?>
    <div class="row">
      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>
    </div>
    <div class="row">
      <div class="col-md-3 offset-md-3">.col-md-3 .offset-md-3</div>
      <div class="col-md-3 offset-md-3">.col-md-3 .offset-md-3</div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">.col-md-6 .offset-md-3</div>
    </div>

  </div>
  </div>
  </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="./assets/js/vendor/popper.min.js"></script>
      <script src="./dist/js/bootstrap.min.js"></script>

      <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
      <script>
        feather.replace()
      </script>
      <script type="text/javascript" src="./cadastro_combustivel/js/custom.js"></script>
  </body>
</html>


