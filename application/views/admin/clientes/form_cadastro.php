<?php 

if ($this->session->userdata('usuario_logado')['admin'] !== '1') {
	redirect('home');
}


$this->load->view('template_admin/header'); ?>

<div class="container">
	<h1 class="titulo-page">Cadastre um novo cliente</h1>

	<?php if (validation_errors()) { ?>
		<div class="error grid-12">
			<?= validation_errors(); ?>
		</div>
	<?php } ?>

	
	<form class="form" action="<?= base_url('admin/clientes/cadastro') ?>" method="post">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome" placeholder="Nome">

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" placeholder="Email">

		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf" placeholder="CPF">

		<select name="sexo" id="sexo" class="select">
			<option disabled selected>Selecione o Sexo</option>
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
		</select>

		<label for="senha">Senha:</label>
		<input type="password" name="senha" id="senha" placeholder="Senha">

		<button class="btn" type="submit" >Cadastrar</button>

	</form>
</div>


<?php $this->load->view('template_admin/footer'); ?>
