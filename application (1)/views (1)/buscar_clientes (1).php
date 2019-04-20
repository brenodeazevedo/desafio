<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/consulta.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="box5">
	<div class="box6">
	<h5><?= $this->session->flashdata("mensagem");?></h5>
	<form class="form-cadastro" action="<?=base_url('arena/consultar');?>" method="post">
		<div class="form-group col-md-4">
			<input type="text" class="form-control" name="busca" placeholder="Buscar cliente por nome">
		</div>
		<div class="btn-consultar">
		<button type="submit" class="btn btn-consulta">Entrar</button></div>
	</form>
</div>
</div>
</body>
</html>