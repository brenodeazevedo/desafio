<html>
<head>
	<title>Bem-vindo</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/inserir.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function valor() {
    		var image = document.getElementById('imagem').value;
    		var res = image.slice(12);
    		var img = document.getElementById('img').value = res;
  		};
	</script>
</head>
<body>
<div class="box3">
    <div class="box4">
	<form action="<?= base_url('Eventos/upload')?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
			<input id="img" name="img" placeholder="Não há arquivos" class="in" />
         	<div class="fileUpload btn btn-primary button1 inserir" onchange="valor()">
                <span>Selecionar Arquivo</span>
                <input id="imagem" type="file" name="imagem" class="upload" />
            </div>

        </div>
        <button class="btn btn-inserir">Enviar</button>
    </form>
</div>
</div>
</body>
</html>