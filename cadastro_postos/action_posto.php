<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Sistema de Combustivel</title>
	<link rel="shortcut icon" href="../imagens/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php
    
    require './../config/conexao.php';
    require './../utils/utils.php';
    
    // Atribui uma conexão PDO
    $conexao = conexao::getInstance();

    // Recebe os dados enviados pela submissão
    $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $razao_social = (isset($_POST['razao_social'])) ? $_POST['razao_social'] : '';
    $cnpj = (isset($_POST['cnpj'])) ? $_POST['cnpj'] : '';
    $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : '';
    $bandeira = (isset($_POST['bandeira'])) ? $_POST['bandeira'] : '';
    $distribuidora = (isset($_POST['distribuidora'])) ? $_POST['distribuidora'] : '';
    $origem = (isset($_POST['origem'])) ? $_POST['origem'] : '';
    $metodo_coleta = (isset($_POST['metodo_coleta'])) ? $_POST['metodo_coleta']:'';
    $numero_nota_fiscal = (isset($_POST['numero_nota_fiscal'])) ? $_POST['numero_nota_fiscal'] : '';
    $produto = (isset($_POST['produto'])) ? $_POST['produto'] : '';
    $data_de_compra = (isset($_POST['data_de_compra'])) ? $_POST['data_de_compra'] : '';
    $preco_de_compra = (isset($_POST['preco_de_compra'])) ? $_POST['preco_de_compra'] : '';
    $data_da_venda_coleta = (isset($_POST['data_da_venda_coleta'])) ? $_POST['data_da_venda_coleta'] : '';
    $preco_de_venda = (isset($_POST['preco_de_venda'])) ? $_POST['preco_de_venda'] : '';
    
    // TODO - Adicionar validação 
    // include 'form-pesquisa-validacao.php';

        // Verifica se foi solicitada a inclusão de dados
    if ('incluir' === $acao) {
        $data_ansi = dateToDB($data_de_compra);
        
        $data_ansi2 = dateToDB($data_da_venda_coleta);

        $sql = 'INSERT INTO pesquisa (razao_social, cnpj, municipio, bandeira, distribuidora, origem, 
            metodo_coleta, numero_nota_fiscal, produto, data_de_compra, preco_de_compra, data_da_venda_coleta, preco_de_venda)
			VALUES(:razao_social, :cnpj, :municipio, :bandeira, :distribuidora, :origem, 
            :metodo_coleta, :numero_nota_fiscal, :produto, :data_de_compra, :preco_de_compra, :data_da_venda_coleta, :preco_de_venda)';

        $stm = $conexao->prepare($sql);
        $stm->bindValue(':razao_social', $razao_social);
        $stm->bindValue(':cnpj', $cnpj);
        $stm->bindValue(':municipio', $municipio);
        $stm->bindValue(':bandeira', $bandeira);
        $stm->bindValue(':distribuidora', $distribuidora);
        $stm->bindValue(':origem', $origem);
        $stm->bindValue(':metodo_coleta', $metodo_coleta);
        $stm->bindValue(':numero_nota_fiscal', $numero_nota_fiscal);
        $stm->bindValue(':produto', $produto);
        $stm->bindValue(':data_de_compra', $data_ansi);
        $stm->bindValue(':preco_de_compra', $preco_de_compra);
        $stm->bindValue(':data_da_venda_coleta', $data_ansi2);
        $stm->bindValue(':preco_de_venda', $preco_de_venda);        
        $retorno = $stm->execute();

        if ($retorno) {
            echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
        }

        echo "<meta http-equiv=refresh content='3;URL=../painel.php'>";
    }

    if ('editar' === $acao) {
        // Constrói a data no formato ANSI yyyy/mm/dd
        $data_ansi = dateToDB($data_de_compra);
     
        $data_ansi2 = dateToDB($data_da_venda_coleta); 

        $sql = 'UPDATE pesquisa SET razao_social=:razao_social, cnpj=:cnpj, municipio=:municipio, bandeira=:bandeira, distribuidora=:distribuidora, origem=:origem, metodo_coleta=:metodo_coleta,
                                    numero_nota_fiscal=:numero_nota_fiscal, produto=:produto, data_de_compra=:data_de_compra, preco_de_compra=:preco_de_compra, data_da_venda_coleta=:data_da_venda_coleta,
                                    preco_de_venda=:preco_de_venda ';
        $sql .= 'WHERE id = :id';

        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->bindValue(':razao_social', $razao_social);
        $stm->bindValue(':cnpj', $cnpj);
        $stm->bindValue(':municipio', $municipio);
        $stm->bindValue(':bandeira', $bandeira);
        $stm->bindValue(':distribuidora', $distribuidora);
        $stm->bindValue(':origem', $origem);
        $stm->bindValue(':metodo_coleta', $metodo_coleta);
        $stm->bindValue(':numero_nota_fiscal', $numero_nota_fiscal);
        $stm->bindValue(':produto', $produto);
        $stm->bindValue(':data_de_compra', $data_ansi);
        $stm->bindValue(':preco_de_compra', $preco_de_compra);
        $stm->bindValue(':data_da_venda_coleta', $data_ansi2);
        $stm->bindValue(':preco_de_venda', $preco_de_venda);        
        $retorno = $stm->execute();

        if ($retorno) {
            echo "<div class='alert alert-success' role='alert'> Pesquisa editado com sucesso, Aguarde você está sendo redirecionado ...</div> ";
        } else {
            echo "<div class='alert alert-danger' role='alert'> Erro ao editar Pesquisa! </div> ";
        }

        echo "<meta http-equiv=refresh content='3;URL=../painel.php'>";
    }

        // Verifica se foi solicitada a exclusão dos dados
    if ('excluir' === $acao) {

        // Exclui o registro do banco de dados
        $sql = 'DELETE FROM pesquisa WHERE id = :id';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $retorno = $stm->execute();

        if ($retorno) {
            echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
        }

        //head ('Location: ../painel.php');
        echo "<meta http-equiv=refresh content='3;URL=../painel.php'>";
    }
    ?>

	</div>
</body>
</html>