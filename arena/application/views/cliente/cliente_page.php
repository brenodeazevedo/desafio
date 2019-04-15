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
	<a href="<?php echo base_url('/arena/') ?>" class="btn btn-primary">Sair</a>
</body>

</html>

