<?php  

if (!$this->session->userdata('usuario_logado')) {
	redirect('login');
}


$this->load->view('template_site/header'); ?>

<div class="container">
	<h1 class="titulo-page">Seja Bem Vindo</h1>
	<p class="subtitulo">Sinta-se a Vontade para Adicionar sua própria Galeria de Fotos</p>
	<span>Últimos Eventos adicionados</span>

	<!-- Lista os últimos eventos adicionados pelos clientes -->
	<ul class="galeria">
		<?php foreach($eventos as $evento): ?>
			<li class="item-galeria grid-3">
				<img src="<?= base_url();?>public/uploads/<?=$evento->usuario_id.'/'.$evento->path_img ?>" alt="Imagem da Arena das Dunas">
				<p><?= $evento->nome_evento ?></p>
			</li>
		<?php endforeach ?>

	</ul>



</div>


<?php  $this->load->view('template_site/footer'); ?>
