<?php 

if ($this->session->userdata('usuario_logado')['admin'] !== '1') {
	redirect('home');
}


$this->load->view('template_admin/header'); ?>

<p class="subtitulo grid-12">Detalhes da Administração</p>

	<nav class="nav-info container">
		<ul >
			<li class="nav-info-item grid-4 container">
				<div class="box-info grid-6">
					Clientes: 1500
				</div>
				<div class="icone grid-6">
					<i class="fa fa-users" aria-hidden="true"></i>
				</div>
			</li>

			<li class="nav-info-item grid-4 container">
				<div class="box-info grid-6">
					Admins: 3
				</div>
				<div class="icone grid-6">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</li>

			<li class="nav-info-item grid-4 container">
				<div class="box-info grid-6">
					Imagens: 870
				</div>
				<div class="icone grid-6">
					<i class="fa fa-picture-o" aria-hidden="true"></i>
				</div>
			</li>
		</ul>
	</nav>




<?php $this->load->view('template_admin/footer'); ?>
