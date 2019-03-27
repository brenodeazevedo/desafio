
<!-- EDITAAAR CADASTRO -->

<div class="container">
    <div class="row justify-content-md-center">
<form class="login">
  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="usuario" placeholder="Usuário">
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="Senha">
  </div>

  <a href="<?php $this->load->view('cadatro'); ?>">Fazer Cadastro</a>

  <a href="#"><input type="submit" class="btn btn-secondary" value="Fazer Login" /></a>

</form>
</div>
</div>

<?php $this->load->view('footer'); ?>