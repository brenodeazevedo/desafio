<html>
<head>
	<title>Bem-vindo!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/feed-cliente.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div class="box-cliente">
   <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators car">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/imagens/arena.jpg');?>" class="img-slide">
      </div>
      <?php 
      foreach ($eventos as $e) { ?>
        <div class="carousel-item">
          <img class="img-fluid img-slide" src="<?=base_url('assets/imagens/'.$e->imagem);?>">
          <div class="carousel-caption">
          </div>   
        </div>
      <?php  }
      ?>
      <a class="carousel-control-prev btn-pv-nxt" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon btn-pv-nxt"></span>
      </a>
      <a class="carousel-control-next btn-pv-nxt" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon btn-pv-nxt"></span>
      </a>
    </div>
    
  </div>
</div>
</body>
</html>
