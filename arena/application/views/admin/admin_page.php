<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (($this->session->userdata('usuario_logado') == false) || (($this->session->userdata('usuario_logado'))['usuario_role'] == 0)
) {
	$this->session->set_flashdata('error', 'Usuário ou senha inválidos');
	//redirect('/login/home', 'refresh');
} else {
	$this->session->set_flashdata('success', 'Logado com sucesso');
	// redirect('/login/home', 'refresh');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Home</title>
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
	<h2>Bem-Vindo <?php print_r($this->session->userdata('usuario_logado')['nome']) ?></h2>
	<a href="<?php echo base_url('/arena/') ?>" class="btn btn-danger">Sair</a>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Imagens</h5>
					<p class="card-text">Adicione as imagens a galeria dos clientes</p>
					<a href="<?php echo site_url('arena/admin/galeria') ?>" class="btn btn-primary">Cadastrar</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Clientes</h5>
					<p class="card-text">Cadastrar, Listar, editar e excluir clientes do sistema.</p>
					<a href="<?php echo site_url('arena/lista') ?>" class="btn btn-primary">Clientes</a>
				</div>
			</div>
		</div>
	</div>

	</div>
	</div>

</body>


</html>
