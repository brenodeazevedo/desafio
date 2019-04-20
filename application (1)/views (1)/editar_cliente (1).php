<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/editar.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Faça as alterações que desejar.</h2><hr>
      <form action="<?= base_url('arena/atualizar/'.$usuario->id_usuarios)?>" method="post">
        <div class="link">
            <button type="submit" class="btn atualizar">Atualizar</button>
                </div>

                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Nome</label>
                        <input class="form-control" type="text" placeholder="Informe o nome" name="nome" value="<?= $usuario->nome ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Email</label>
                        <input class="form-control" type="email" placeholder="Informe o email" name="email" value="<?= $usuario->email ?>">
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Cpf</label>
                        <input class="form-control" type="text" placeholder="Informe o cpf" name="cpf" value="<?= $usuario->cpf ?>">
                        
                      </div>

                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Telefone</label>
                        <input class="form-control" type="text" placeholder="Informe o telefone" name="telefone" value="<?= $usuario->telefone ?>">
                        
                      </div>
                    </div>

                    <div id="success"></div>
                  </form>
</body>
</html>