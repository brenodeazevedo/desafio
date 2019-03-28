<?php $this->load->view('header'); ?>

<div class="container teste">
<form class="needs-validation  justify-content-sm-center" novalidate action="logar.php">
  <div class="form-row topo">
  
    <div class="col-md-5 mb-3">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome" required>
    </div>
    <div class="col-md-5 mb-3">
      <label for="telefone">Telefone</label>
      <input type="tel" class="form-control" id="telefone" placeholder="Telefone" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label for="usuario">Usuário</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Usuário" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="senha01">Senha</label>
      <input type="password" class="form-control" id="senha01" placeholder="Senha" required>
    </div>
     </div>
  <button class="btn btn-primary" type="submit">Cadastrar</button>
</form>
</div>


<?php $this->load->view('footer'); ?>