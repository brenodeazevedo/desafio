<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>" />
</head>
<body>

<header> 
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
	<div class="container">
    <a class="navbar-brand" href="#"><img width="80px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Logos.svg/1200px-Logos.svg.png"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
</button>
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-item nav-link active" href="#">Home <span class="sr-only">(Página atual)</span></a></li>
      <li class="nav-item"><a class="nav-item nav-link" href="#">Destaques</a></li>
      <li class="nav-item"><a class="nav-item nav-link" href="#">Preços</a></li>
      <li class="nav-item"><a class="nav-item nav-link disabled" href="#">Desativado</a></li>
    </div>
  </div>
</nav>
	
	</header>


  <?php $this->load->view('cadastro'); ?>





<?php
$this->load->view('footer');
?>