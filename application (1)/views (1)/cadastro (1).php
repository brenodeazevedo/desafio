<html>
<head>
	<title>Bem-vindo</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cadastro.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput-1.1.4.pack.js"/></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#cpf").mask("999.999.999-99");
		});
	</script>

</head>
<body>
<div class="box3">
	<div class="box4">
		
		<form class="form-cadastro" action="<?=base_url('Usuario/cadastrar');?>" method="post">
			<div class="box-alert"><h5><?= $this->session->flashdata("mensagem2");?></h5></div>
			<div class="form-group col-md-4">
				<label for="name">Nome completo:</label>
				<input type="text" class="form-control" id="nome" name="nome" required="required">
			</div>
			<div class="form-group col-md-4">
				<label for="tel">Telefone:</label>
				<input type="text" class="form-control" id="telefone" name="telefone" required="required">
			</div>
			<div class="form-group col-md-4">
				<label for="cpf">CPF:</label>
				<input type="text" class="form-control" id="cpf" name="cpf">
			</div>
			<div class="form-group col-md-4">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" required="required">
			</div>
			<div class="form-group col-md-4">
				<label for="pwd">Senha:</label>
				<input type="password" class="form-control" id="senha" name="senha" required="required">
			</div>
			
			<button type="submit" value="2" name="tipo" class="btn btn-primary btn-cadastro">Cadastrar</button>

		</form>
	</div>
</div>
</body>
</html>
