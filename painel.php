<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title>Procon PB - SI (Sistemas Internos)</title>
    <link rel="shortcut icon" href="./favicon.ico" >

		<link href="./dist/css/bootstrap.min.css" rel="stylesheet" />

		<link href="./assets/css/dashboard.css" rel="stylesheet" />
</head>

<body>
		<?php

    require './config/conexao.php';
    require_once './utils/utils.php';

    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysql_error());

    mysqli_select_db($conexao, DBNAME) or die(mysqli_error());

    verificaSessao();

    // Recebe o termo de pesquisa se existir
    $termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

    // Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
    if (empty($termo)) {
        $conexao = conexao::getInstance();
        $sql = 'SELECT pes.id, pes.id_posto, pos.razao_social, pos.cnpj, pos.municipio, pes.produto, pes.preco_de_compra, pes.preco_de_venda, (pes.preco_de_venda-pes.preco_de_compra) as margem_reais, ((pes.preco_de_venda-pes.preco_de_compra)/pes.preco_de_venda)*100 as variacao 
        FROM pesquisa pes left join posto pos on (pos.id = pes.id_posto);';
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $pesquisas = $stm->fetchAll(PDO::FETCH_OBJ);
    } else {
        // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
        $conexao = conexao::getInstance();
        $sql = 'SELECT id, razao_social, cnpj, municipio, produto, preco_de_compra, preco_de_venda, (preco_de_venda-preco_de_compra) as margem_reais, ((preco_de_venda-preco_de_compra)/preco_de_venda)*100 as variacao FROM pesquisa WHERE razao_social LIKE :razao OR produto LIKE :produto 
        OR cnpj LIKE :cnpj OR municipio LIKE :municipio';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':razao', $termo.'%');
        $stm->bindValue(':produto', $termo.'%');
        $stm->bindValue(':cnpj', $termo.'%');
        $stm->bindValue(':municipio', $termo.'%');
        $stm->execute();
        $pesquisas = $stm->fetchAll(PDO::FETCH_OBJ);
    }
  ?>
    
    <?php include './partials/header.php'; ?>

      <?php include './partials/menu_sidebar.php'; ?>
    
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          <?php $HeaderContext = 'Combustíveis'; ?>
          <?php include './partials/headercontext.php'; ?>


          <form action="" method="POST" id='form-contato' >
            <div class="row">
              <div class="col">          
              <label class="control-label" for="termo">Buscar</label>            
                <input type="text" class="form-control" id="termo" name="termo" placeholder="Infome a Razão Social ou Produto ou CNPJ">
              </div>
            </div>
            <br>
              <div class="row">
              <div class="col">          
                  <button type="submit" class="btn btn-outline-danger">Pesquisar</button>
                  <a href='painel.php' class="btn btn-outline-info">Ver Todos</a>
                  <a href="./cadastro_postos/cadastro.php" class="btn btn-outline-success">Cadastrar Postos</a>
                  <a href='./cadastro_combustivel/cadastro.php' class="btn btn-outline-success">Cadastrar Pesquisa</a>  
              </div>
              </div>
          </form>
  
          <?php if (!empty($pesquisas)) { ?>
          <!-- table table-striped -->
          <table class="table table-bordered table-hover table-sm" >
          <caption>Listagem das Pesquisas</caption>
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">RAZÃO SOCIAL</th>
                <th scope="col">CNPJ</th>
                <th scope="col">MUNICIPIO</th>
                <th scope="col">PRODUTO</th>
                <th scope="col">VALOR COMPRA</th>
                <th scope="col">VALOR VENDA</th>
                <th scope="col">MARGEM REAIS</th>
                <th scope="col">% VARIAÇÃO</th>
                <th scope="col">AÇÃO</th>
              </tr>
            </thead>
            <tbody>				
            <?php foreach ($pesquisas as $pesquisa){ ?>
              <tr>
                <th scope="row"><?php echo $pesquisa->id; ?></th>
                <td><?php echo $pesquisa->razao_social; ?></td>
                <td><?php echo $pesquisa->cnpj; ?></td>
                <td><?php echo $pesquisa->municipio; ?></td>
                <td><?php echo $pesquisa->produto; ?></td>
                <td><?php echo $pesquisa->preco_de_compra; ?></td>
                <td><?php echo $pesquisa->preco_de_venda; ?></td>
                <td><?php echo $pesquisa->margem_reais; ?></td>
                <td><?php echo $pesquisa->variacao; ?></td>
                
                <td>
                  <a href='./cadastro_combustivel/editar.php?id=<?php echo $pesquisa->id; ?>' class="btn btn-outline-info">Editar</a>															
                  <a href='javascript:void(0)' class="btn btn-outline-danger link_exclusao" rel="<?php echo $pesquisa->id; ?>">Excluir</a>
                </td>
              </tr>	
            <?php
      } ?>
          </table>
        <?php 
    } else {
        ?>
         <h3 class="text-center text-primary">Não existem pesquisas cadastradas!</h3>
        <?php
    } ?>

        
          </div>
          
        </main>
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