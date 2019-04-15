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
	<div class="container">
		<h2>Editar Cliente</h2>
		<form action="<?php echo base_url('arena/admin/cliente/cadastro') ?>" method="POST">
			<div class="form-row">
				<div class="form-group col-md-7">
					<label for="inputNome">Nome</label>
					<input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome completo" value="<?php echo $usuario->nome ?>" required>
				</div>
				<div class="form-group col-md-7">
					<label for="inputNome">Usuario</label>
					<input type="text" class="form-control" id="inputNome" name="usuario" placeholder="Usuário" value="<?php echo $usuario->usuario ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputSenha">Nova senha</label>
					<input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha" required>
				</div>
			</div>
			<a href="<?php echo base_url('arena/lista') ?>" class="btn btn-primary">Voltar</a>
			<input type="hidden" name="usuario_id" value="<?php echo $usuario->usuario_id ?>">
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</form>

	</div>

</body>

</html>