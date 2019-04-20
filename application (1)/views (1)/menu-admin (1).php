<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/menu-admin.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
 <div class="menu">
   <a href="<?=base_url('arena/cadastrar');?>" class="ops">Cadastrar cliente</a>
		<a href="<?=base_url('arena/busca');?>" class="ops">Consultar</a>
		<a href="<?=base_url('arena/clientes');?>" class="ops">Listar</a>
		<a href="<?=base_url('eventos/cadastrarEvento');?>" class="ops">Inserir imagens</a>
		<a href="<?= base_url('Usuario/logoff');?>" class="ops">Sair</a>
 </div> 
</body>
</html>