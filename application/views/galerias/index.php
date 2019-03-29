<?php 

if (!$this->session->userdata('usuario_logado')){
	redirect('login');
}

if (!$this->session->userdata('usuario_logado')['admin'] === '1'){
	redirect('home');
}
$usuario = $this->session->userdata('usuario_logado')['data_user'][0];

$this->load->view('template_site/header');

?>

<h1 class="titulo-page">Meus Eventos</h1>

<?php $this->load->view('components/alerts'); ?>

<div class="container">
	<a class="btn" href="<?= base_url();?>galeria/form_cadastro">Cadastrar Evento</a>
	

	<?php if ($eventos){ ?>
		<ul class="galeria">
			<?php foreach($eventos as $evento): ?>
				<li class="item-galeria grid-3">
					<img src="<?= base_url();?>public/uploads/<?=$id_usuario_logado.'/'.$evento->path_img ?>" alt="Imagem da Arena das Dunas">
					<p><?= $evento->nome_evento ?></p>
				</li>
			<?php endforeach ?>
		</ul>

	<?php } 
		else {
	?>
		<div class="grid-12 sem-eventos">
			<h2 class="">Você não tem Eventos</h2>
		</div>
		
	<?php }?>
</div>


<?php $this->load->view('template_site/footer'); ?>
