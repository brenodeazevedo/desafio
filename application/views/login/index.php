<?php 
if ($this->session->userdata('usuario_logado')) {
	redirect('home');
}

$this->load->view('template_site/header'); 


?>

<div class="container">
	<h1 class="titulo-page">Login</h1>

	<?php if (validation_errors()) { ?>
		<div class="error grid-12">
			<?= validation_errors(); ?>
		</div>
	<?php } ?>
	

	<form class="form form-margin" action="<?= base_url()?>login" method="post">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email">

		<label for="senha">Senha</label>
		<input type="password" name="senha" id="senha" value="<?= set_value('senha') ?>" placeholder="Senha">

		<button class="btn" style="background: #225fc1">Login</button>
	</form>
	
</div>

<?php $this->load->view('template_site/footer'); ?>
