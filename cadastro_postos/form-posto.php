<?php
    require_once './../utils/utils.php';
?>

<script src="js/jquery-1.2.6.pack.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>

<!--escript mascara do cnpj -->
<script type="text/javascript">
	$(document).ready(function(){	
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>

<!-- Iniciando formulario de cadastro de postos -->
<b><span class="text-black-50">DADOS DO CADASTRO DE POSTOS</span></b>
<hr>   

<div class="form-row">

    <div class="form-group col-md-4">
        <label for="razao_social">POSTO</label>
        <input type="text" class="form-control" id="razao_social" maxlength="100" name="razao_social" value="<?php echo $pesquisa->razao_social; ?>" placeholder="Informe a Razão Social">
    </div>
            
    <div class="form-group col-md-4">
        <label for="razao_social">RAZÃO SOCIAL</label>
        <input type="text" class="form-control" id="razao_social" maxlength="100" name="razao_social" value="<?php echo $pesquisa->razao_social; ?>" placeholder="Informe a Razão Social">
        <span class='msg-erro msg-cpf'></span>
    </div>

    <div class="form-group col-md-4">
        <label for="cnpj">CNPJ</label>
        <input type="text" class="form-control" id="cnpj" maxlength="14" name="cnpj" value="<?php echo $pesquisa->cnpj; ?>" placeholder="Ex: 00.000.000/0001-00">
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


