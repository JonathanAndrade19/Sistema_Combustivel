<!DOCTYPE html>
<html>
<head>    
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Procon PB - SI (Sistemas Internos)</title>

	<link href="../dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/dashboard.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
	
</head>

<?php
    require_once './../utils/utils.php';
		verificaSessao();
		$pesquisa = array();
		$pesquisa = (object) $pesquisa;
?>

<body>
	<?php include("./../partials/header.php"); ?>
  	<?php include("./../partials/menu_sidebar.php"); ?>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<?php $HeaderContext = "Cadastro de Postos"; ?>
				<?php include("./../partials/headercontext.php")  ?>
	
				<!-- Inicio Formulário  enctype='multipart/form-data' -->
				<form action="./../../painel.php" method="post" id='form-contato'>
					
					<div class="row">

						<div class="col-md-12">						
							<?php include("./form-posto.php"); ?>
						</div>

					</div>
					<hr>
					<div class="row">

						<div class="ml-md-auto">               
								<input type="hidden" name="acao" value="incluir">
								<button type="submit" class="btn btn-outline-success" id='botao'>Gravar</button>
								<a href='../painel.php' class="btn btn-outline-danger">Cancelar</a>
						</div>
					
					</div>
           
        </form>

			</main>
	
			<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
			<script src="../assets/js/vendor/popper.min.js"></script>
      <script src="../dist/js/bootstrap.min.js"></script> -->
	
			<!-- Icons -->
			<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
			<script> feather.replace() </script>
		
			<script type="text/javascript" src="./js/custom.js"></script>
	
</body>
</html>