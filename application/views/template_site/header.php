<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Arena Eventos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url();?>public/css/main.css ">
</head>
<body>

<header class="cabecalho cabecalho-blue">
	<div class="container">

		<a class="logo grid-4" href="<?= base_url();?>home">Arena Eventos</a>

		<nav class="menu grid-8">
			<ul>
				
				<?php if ($usuario = $this->session->userdata('usuario_logado')['data_user'][0]){ ?>
					<li><a class="nome-perfil" href="<?= base_url();?>clientes/perfil"><?= $usuario->nome?></a></li>
				<?php } ?>

				<?php if ($this->session->userdata('usuario_logado')['admin'] === '0'){ ?>
					<li><a href="<?= base_url();?>galeria">Minha Galeria</a></li>
				<?php } ?>
		

				<?php if ($this->session->userdata('usuario_logado')['admin'] === '1'){ ?>
					<li><a href="<?= base_url();?>admin"> Administração</a></li>
				<?php } ?>
				


				<?php if (!$this->session->userdata('usuario_logado')){ ?>
					<li><a href="<?= base_url();?>login">Login</a></li>
				<?php } ?>

				<?php if ($this->session->userdata('usuario_logado')){ ?>
					<li><a href="<?= base_url();?>logout">Sair</a></li>
				<?php } ?>
			</ul>
		</nav>

	</div>
</header>
