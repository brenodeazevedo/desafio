<?php 

if ($this->session->userdata('usuario_logado')['admin'] !== '1') {
	redirect('home');
}



$this->load->view('template_admin/header'); ?>


<div class="container">
	<h1 class="titulo-page">Lista os clientes</h1>

	<?php $this->load->view('components/alerts'); ?>

	<a class="btn btn-criar" href="<?= base_url();?>admin/clientes/form_cadastro">Cadastrar Novo Cliente</a>
<div class="wrap">
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($clientes as $cliente) : ?>
				<tr>
					<td><?= $cliente->nome ?></td>
					<td><?= $cliente->email ?></td>
					<td>
						<a class="btn btn-editar" href="<?=base_url();?>admin/clientes/form_update/<?=$cliente->id?>">Editar</a>
						<a class="btn btn-excluir" href="<?=base_url();?>admin/clientes/excluir/<?=$cliente->id?>">Deletar</a>
					</td>
					
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

	<div class="container">
		<div class="pagination">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

<?php $this->load->view('template_admin/footer'); ?>
