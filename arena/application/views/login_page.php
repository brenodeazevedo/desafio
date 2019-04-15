<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Login</title>
</head>

<body>
	<?php if ($this->session->flashdata('success')) { ?>
		<div class="alert alert-success">
			<?= $this->session->flashdata('success') ?>
		</div>
	<?php } ?>
	<?php if ($this->session->flashdata('error')) { ?>
		<div class="alert alert-danger">
			<?= $this->session->flashdata('error') ?>
		</div>
	<?php } ?>
	<!-- <div class="container"> -->
	<div class="card text-center col-4 mx-auto">
		<div class="card-header">
			<img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/pt/0/07/Logomarca_da_Arena_das_Dunas.jpg" alt="Arena das Dunas">
		</div>
		<div class="card-body">
			<form action="<?php echo base_url('arena/cliente') ?> " method="POST">
				<div class="form-group row">
					<label for="inputUsuario" class="col-sm-3 col-form-label">Usuário</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuário">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputSenha" class="col-sm-3 col-form-label">Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5 mx-auto">
						<button type="submit" class="btn btn-success">Login</button>
						<!-- <a href="<?php echo site_url('usuario/cadastro') ?>" class="btn btn-primary">Cadastrar</a> -->
					</div>

				</div>
			</form>
		</div>

</body>

</html>
