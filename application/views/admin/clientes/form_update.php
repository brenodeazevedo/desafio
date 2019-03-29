<?php 

if ($this->session->userdata('usuario_logado')['admin'] !== '1') {
	redirect('home');
}


$this->load->view('template_admin/header'); ?>

<div class="container">
	<h1 class="titulo-page">Editar cliente</h1>

	<?php if (validation_errors()) { ?>
		<div class="error grid-12">
			<?= validation_errors(); ?>
		</div>
	<?php } ?>

	
	<form class="form" action="<?= base_url('admin/clientes/atualizar/'.$cliente->id)?>" method="post">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome" placeholder="Nome" value="<?= $cliente->nome ?>">

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" placeholder="Email" value="<?= $cliente->email ?>">

		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?= $cliente->cpf ?>">

		<label for="senha">Senha:</label>
		<input type="password" name="senha" id="senha" placeholder="Senha" value="<?= $cliente->senha ?>">

		<label for="admin">Promover a admin</label>
		<select style="display: block; margin-bottom: 10px;" name="admin" id="admin">
			<?php if ($cliente->admin): ?>
				<option selected value="1">Sim</option>
				<option value="0">Não</option>
			<?php endif;?>

			<?php if (!$cliente->admin): ?>
				<option value="1">Sim</option>
				<option selected value="0">Não</option>
			<?php endif;?>
		</select>
		

		<button class="btn" type="submit" >Cadastrar</button>

	</form>
</div>


<?php $this->load->view('template_admin/footer'); ?>
