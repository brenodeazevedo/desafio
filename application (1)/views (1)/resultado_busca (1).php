<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<table class="table">

    <?php 
    foreach ($busca as $b) { ?>
      <tr>
        <td><?= $b->nome?></td>
        <td><?= $b->telefone?></td>
        <td><?= $b->cpf?></td>
        <td><?= $b->email?></td>
        <td><a href="<?= base_url('arena/excluir/'.$b->id_usuarios);?>">Excluir</a></td>
        <td><a href=""> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
<?php  }
?>

</table>
</body>
</html>