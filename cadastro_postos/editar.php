<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Procon PB - (Sistemas Combustível)</title>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css"> 
    
</head>

<?php

    require_once './../config/conexao.php';
    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysql_error());

    mysqli_select_db($conexao, DBNAME) or die(mysqli_error());

    session_start();
    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        header('Location: index.php');
        exit;
    }
        echo '<center>Você está logado</center>';

    // Recebe o id da Pesquisa via GET
    if (isset($_GET['id'])) {
        $id_pesquisa = (isset($_GET['id'])) ? $_GET['id'] : '';
    }

    // Valida se existe um id e se ele é numérico
    if (!empty($id_pesquisa) && is_numeric($id_pesquisa)) {
        // Captura os dados do pesquisa solicitado
        $conexao = conexao::getInstance();
        $sql = 'SELECT id, razao_social, cnpj, municipio, bandeira, distribuidora, origem, metodo_coleta, numero_nota_fiscal, produto,
        data_de_compra, preco_de_compra, data_da_venda_coleta, preco_de_venda, margem_reais, variacao, f_de_abastecimento, media_mensal_litro 
        FROM pesquisa WHERE id = :id';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id_pesquisa);
        $stm->execute();

        $pesquisa = $stm->fetch(PDO::FETCH_OBJ);
        
    }

?>

    <body>
    <?php include './../partials/header.php'; ?>
        <?php include './../partials/menu_sidebar.php'; ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php $HeaderContext = 'Cadastro de Pesquisa Combustível - Editar'; ?>
                <?php include './../partials/headercontext.php'; ?>

	            <?php if (empty($pesquisa)) {
    ?>
                        <h3 class="text-center text-danger">Pesquisa não encontrada!</h3>
                        <?php 
                        } else {
                            
        ?>

                            <form class="form-api needs-validation" action="action_pesquisa.php" method="post" id='form-contato'>

                                <div class="row">

                                    <div class="col-md-12">						
                                        <?php include 'form-pesquisa.php'; ?>
                                    </div>

                                    </div>
                                    <hr>
                                    <div class="row">

                                    <div class="ml-md-auto">               
                                            <input type="hidden" name="acao" value="editar">                                        
                                            <input type="hidden" name="id" value="<?= $pesquisa->id ?>">
                                            <button type="submit" class="btn btn-outline-success" id='botao'>Gravar</button>
                                            <a href='../painel.php' class="btn btn-outline-danger">Cancelar</a>
                                    </div>

                                </div>


                            </form>

                     <?php
    } ?>

                </main>
            </div>
            </div>
           
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script>
                window.jQuery || document.write('<script src="./assets/js/vendor/jquery-slim.min.js"><\/script>')
            </script>
            <script src="../assets/js/vendor/popper.min.js"></script>
            <script src="../dist/js/bootstrap.min.js"></script>

            <!-- Icons -->
			<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
			<script> feather.replace() </script>
		
			<script type="text/javascript" src="./js/custom.js"></script>            

    </body>


</html>