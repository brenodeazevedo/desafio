<html>
<head>
  <title>Bem-vindo</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/clientes.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
        <table class="table">
    <thead class="tabela-cabeça">
      <tr>

         <th colspan="6" class="venda-dataa">Lista de clientes</th>
     </tr>
     <tr>
        <th>Nome</th>
      <th>Telefone</th>
      <th>CPF</th>
      <th>E-mail</th>
      <th>Editar</th>
      <th>Excluir</th>

  </tr>
</thead>
<tbody class="corpo">
  <?php 
    foreach ($usuarios as $u) { ?>
      <tr>
        <td><?= $u->nome?></td>
        <td><?= $u->telefone?></td>
        <td><?= $u->cpf?></td>
        <td><?= $u->email?></td>
        <td><a href="<?= base_url('arena/excluir/'.$u->id_usuarios);?>">Excluir</a></td>
        <td><a href="<?= base_url('arena/editar/'.$u->id_usuarios);?>"> <i class="fa fa-trash" aria-hidden="true">Editar</a></td>
        </tr>
    <?php  }
    ?>
</tbody>
</table>
</body>
</html>
