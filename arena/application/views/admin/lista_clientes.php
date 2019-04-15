<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Document</title>
</head>

<body>
	<div class="container">
		<h2 align="center">Arena das Dunas</h2><br />
		<h4 align="center">Lista de Clientes</h4><br />
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
				</div>
				<div>
					<a class="btn btn-primary" href="<?php echo base_url('/arena/admin/home') ?>">Painel Admin</a>
					<a class="btn btn-primary " href="<?php echo base_url('arena/admin/clientes/cadastro') ?>">Cadastrar</a>

				</div>
				<div>
				</div>
			</div>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th width="25%">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($result))
					foreach ($result as $item) { ?>
					<tr id="<?php echo $item->usuario_id; ?>">
						<td><?php echo $item->nome; ?></td>
						<td>
							<!-- <a class="btn btn-info" href="<?php echo base_url('itemCRUD/' . $item->usuario_id) ?>">Abrir</a> -->
							<a class="btn btn-primary" href="<?php echo base_url('arena/admin/cliente/editar/' . $item->usuario_id) ?>"> Editar</a>
							<button type="submit" class="btn btn-danger remove">Delete</button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<!-- <?php
				foreach ($result as $data) {
					echo $data->nome . " - " . $data->usuario_id . "<br>";
				}
				?> -->
		<p><?php echo $links; ?></p>
		</nav>
		<script type="text/javascript">
			$(".remove").click(function() {
				var id = $(this).parents("tr").attr("id");
				if (confirm('Tem certeza que deseja excluir o cliente?')) {
					$.ajax({
						url: "<?php echo base_url('arena/admin/cliente/delete/'); ?>" + id,
						type: 'POST',
						success: function() {
							alert("Cliente excluido com sucesso!");
							location.reload();
						}
					});
				}
			});
		</script>
	</div>






	</div>


</body>

</html>