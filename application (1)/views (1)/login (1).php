<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/login.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="bg">
		<h5><?= $this->session->flashdata("mensagem");?></h5>
		<div class="login-center">
			<form class="form-cadastro" action="<?=base_url('Usuario/autenticar');?>" method="post">
				<div class="form-group col-md-12">
					<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
				</div>
				<div class="form-group col-md-12">
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
				</div>
				
				<button type="submit" class="btn btn-primary btn-login">Entrar</button>
			</form>
		</div>
	</div>
</body>
</html>