<?php 

if (!$this->session->userdata('usuario_logado')){
	redirect('login');
}

if (!$this->session->userdata('usuario_logado')['admin'] === '1'){
	redirect('home');
}
//$usuario = $this->session->userdata('usuario_logado')['data_user'][0];

$this->load->view('template_site/header');

?>

<div class="container">

	<?php $this->load->view('components/alerts'); ?>

	<div class="grid-12">
		<form class="form-upload" action="<?= base_url();?>galeria/upload" method="POST" enctype="multipart/form-data">
		
			<label for="evento">Nome do Evento</label>
			<input type="text" name="evento" id="evento" placeholder="Nome do Evento">

			<textarea placeholder="Descrição do Evento" name="descricao"></textarea>

			<label for="file" class="input-img" accept="image/*">Selecionar imagem</label>	
			<input type="file" id="file" name="imagem" name="curriculo">
			<p>Imagem: Tamanho máximo - 1MB de 1024x780</p>

			<button class="btn btn-upload" type="submit">Upload</button>
		</form>
	</div>

</div>




<?php $this->load->view('template_site/footer'); ?>
