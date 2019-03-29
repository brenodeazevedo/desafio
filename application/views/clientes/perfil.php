<?php 

//Protegendo a página de usuários não logados
if (!$this->session->userdata('usuario_logado')){
	redirect('login');
}

//Protegendo a galeria de um usuario não admin
if (!$this->session->userdata('usuario_logado')['admin'] === '1'){
	redirect('home');
}

$usuario = $this->session->userdata('usuario_logado')['data_user'][0];

$this->load->view('template_site/header');

 ?>

<div class="container">
	<div class="grid-6 dados-usuario">
		<h1 class="titulo-page"><?= $usuario->nome ?></h1>
		<p>E-mail: <?= $usuario->email ?></p>
		<p>CPF: <?= $usuario->cpf ?></p>
		<p>Sexo: <?= $usuario->sexo ?></p>
	</div>
	<div class="grid-6">
		<p class="subtitulo titulo-top">Alterar minha senha</p>

		<?php if (validation_errors()) { ?>
		<div class="error grid-12">
			<?= validation_errors(); ?>
		</div>
		<?php } ?>
		
		<!-- Componente para exibir mensagens de erro ou sucesso ao realizar certas ações -->
		<?php $this->load->view('components/alerts'); ?>

		<form class="form" action="<?= base_url();?>clientes/perfil/altera-senha" method="POST">
			<label for="senha-antiga">Senha Antiga</label>
			<input type="password" name="senha-antiga" id="senha-antiga" placeholder="Senha Antiga">

			<label for="nova-senha1">Nova senha</label>
			<input type="password" name="nova-senha1" id="nova-senha1" placeholder="Nova senha">

			<label for="nova-senha2">Repetir nova senha</label>
			<input type="password" name="nova-senha2" id="nova-senha2" placeholder="Repetir nova senha">

			<button class="btn btn-editar">Alterar</button>
		</form>
	</div>


</div>





<?php $this->load->view('template_site/footer'); ?>
