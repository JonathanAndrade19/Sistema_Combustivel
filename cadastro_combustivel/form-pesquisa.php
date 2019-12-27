<script>
    function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}
</script>
<?php
    require_once './../config/conexao.php';
    require_once './../utils/utils.php';
    // $defaultTimeZone='UTC';
    // if (date_default_timezone_get()!=$defaultTimeZone) {
    //     date_default_timezone_set($defaultTimeZone);
    // }

    // setlocale (LC_ALL, 'pt_BR');
    // Formata a data no formato nacional
    // $array_data = explode('-', $pesquisa->data_de_compra);
    $data_formatada = dateToView($pesquisa->data_de_compra); // $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

    // Formata a data no formato Nacional
    // $array_data2 = explode('-', $pesquisa->data_da_venda_coleta);
    $data_formatada2 = dateToView($pesquisa->data_da_venda_coleta); // $array_data2[2] . '/' . $array_data2[1] . '/' . $array_data2[0];

?>

        <b><span class="text-black-50">DADOS DO CADASTRO DA PESQUISA</span></b>
        <hr>

        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="razao_social">POSTO</label>
                <input type="text" class="form-control" id="razao_social" maxlength="100" name="razao_social" value="<?php echo $pesquisa->razao_social; ?>" placeholder="Informe a Razão Social">
                <?php
                    // $conexao = conexao::getInstance();

                    // $sql = mysqli_query($conexao, "SELECT * FROM posto");
                    // if($sql === FALSE) { 
                    //    die(mysqli_error());
                    // }
                    // echo '<select class="form-control" name="posto" id="posto">';
                    
                    // while($row = mysqli_fetch_assoc($sql)){
                    //     echo "<option value='".$row['id']."'>".$row['razao_social'].'</option>';
                    // }
                    // mysqli_close($conexao);
                    // echo '</select>';
                    // getPostos($postos, $postos->razao_social, 'Selecione o Posto','posto', 'posto');
                    // generate_OptionsForms($types, $pesquisa->produto, 'Gasolina', 'produto', 'produto');
                ?>                
                <span class='msg-erro msg-cpf'></span>
            </div>
            <div class="form-group col-md-6">

                <label for="razao_social">RAZÃO SOCIAL</label>
                <input type="text" class="form-control" id="razao_social" maxlength="100" name="razao_social" value="<?php echo $pesquisa->razao_social; ?>" placeholder="Informe a Razão Social">
                <span class='msg-erro msg-cpf'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" maxlength="18" name="cnpj" value="<?php echo $pesquisa->cnpj; ?>" placeholder="Ex: 00.000.000/0001-00">
                <span class='msg-erro msg-identidade'></span>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="municipio">MUNICIPIO</label>
                <input type="text" class="form-control" id="municipio" maxlength="25" name="municipio" value="<?php echo $pesquisa->municipio; ?>" placeholder="Informe o Municipio">
                <span class='msg-erro msg-titulo'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="bandeira">BANDEIRA</label>
                <input type="text" class="form-control" id="bandeira" maxlength="25" name="bandeira" value="<?php echo $pesquisa->bandeira; ?>" placeholder="Informe a Bandeira">
                <span class='msg-erro msg-zona'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="distribuidora">DISTRIBUIDORA</label>
                <input type="text" class="form-control" id="distribuidora" maxlength="25" name="distribuidora" value="<?php echo $pesquisa->distribuidora; ?>" placeholder="Informe a Distribuidora">
                <span class='msg-erro msg-secao'></span>
            </div>
    
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="origem">ORIGEM</label>
                <input type="text" class="form-control" id="origem" maxlength="25" name="origem" value="<?php echo $pesquisa->origem; ?>" placeholder="Informe A Origem">
                <span class='msg-erro msg-deficiente'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="metodo_coleta">Método da Coleta</label>
                <input type="text" class="form-control" id="metodo_coleta" maxlength="25" name="metodo_coleta" value="<?php echo $pesquisa->metodo_coleta; ?>" placeholder="Informe o Método da Coleta">
                <span class='msg-erro msg-pis'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="numero_nota_fiscal">Nº DA NF</label>
                <input type="text" class="form-control" id="numero_nota_fiscal" maxlength="22" name="numero_nota_fiscal" value="<?php echo $pesquisa->numero_nota_fiscal; ?>" placeholder="Infome o Nº da NF">
                <span class='msg-erro msg-carteiratrabalho'></span>
            </div>
                  
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="produto">PRODUTO</label>

                <?php
                    $types = ['Gasolina', 'Etanol', 'GNV', 'Diesel', 'Diesel S10', 'GLP'];
                    generate_OptionsForms($types, $pesquisa->produto, 'Gasolina', 'produto', 'produto');
                ?>

                <span class='msg-erro msg-reservista'></span>
            </div>

            <div class="form-group col-md-4">
                <label for="data_de_compra">DATA DA COMPRA</label>
                <input type="text" class="form-control" id="data_de_compra" name="data_de_compra" value="<?php echo $data_formatada; ?>">
                <span class='msg-erro msg-escolar'></span>
            </div>
            
            <div class="form-group col-md-4">
                <label for="data_da_venda_coleta">DATA DA VENDA/COLETA</label>
                <input type="text" class="form-control" id="data_da_venda_coleta" name="data_da_venda_coleta"  maxlength="10" onkeypress="mascaraData( this, event )" value="<?php echo $data_formatada2; ?>">
                <span class='msg-erro msg-curso'></span>
            </div>

        </div>
        
        <div class="form-row">

            <div class="form-group col-md-4 col-auto ">
                <label for="preco_de_compra">PREÇO DA COMPRA</label>
                <input type="text" class="form-control" id="preco_de_compra" maxlength="10" name="preco_de_compra" value="<?php echo $pesquisa->preco_de_compra; ?>" placeholder="Informe o Preço da Compra">
                <span class='msg-erro msg-instituicao'></span>
            </div>

            <div class="form-group col-md-4 col-auto">
                <label for="preco_de_venda">PREÇO DA VENDA</label>
                <input type="text" class="form-control" id="preco_de_venda" maxlength="10" name="preco_de_venda" value="<?php echo $pesquisa->preco_de_venda; ?>" placeholder="Informe o Preço da Venda">
                <span class='msg-erro msg-deficiente'></span>
            </div>
            
        </div>
