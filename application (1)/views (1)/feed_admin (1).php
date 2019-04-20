<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/feed-admin.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="box1">
	<div class="box2">
		<div class="bem-vindo">
			<h2>Olá, Admin.</h2>
			<h4>O que deseja fazer?</h4>
		</div>
		<h5><?= $this->session->flashdata("msg");?></h5>
		<h5><?= $this->session->flashdata("msg2");?></h5>
		<a href="<?=base_url('arena/cadastrar');?>" class="btn btn-primary ops">Cadastrar cliente</a>
		<a href="<?=base_url('arena/busca');?>" class="btn btn-primary ops">Consultar</a>
		<a href="<?=base_url('arena/clientes');?>" class="btn btn-primary ops">Listar</a>
		<a href="<?=base_url('eventos/cadastrarEvento');?>" class="btn btn-primary ops">Inserir imagens</a>
		<a href="<?= base_url('Usuario/logoff');?>" class="btn ops logoff">Sair</a>
		
	</div>
</div>
		<!-- <a href="<?= base_url('Usuario/logoff');?>" class="btn btn-danger">Sair</button>--->
</body>
</html>