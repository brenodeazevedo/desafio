<?php $this->load->view('header'); ?>


<div class="container teste">
<form class="needs-validation" novalidate>
  <div class="form-row topo">
  <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Usuário</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Usuário" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Por favor, escolha um nome de usuário.
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nome</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" required>
      <div class="valid-feedback">
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Telefone</label>
      <input type="tel" class="form-control" id="validationCustom01" placeholder="Telefone" required>
      <div class="invalid-feedback">
        Por favor, insira um número de telefone.
      </div>
    </div>
  </div>
  <div class="form-row justify-content-sm-center">
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">Senha</label>
      <input type="password" class="form-control" id="senha01" placeholder="Senha" required>

    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom04">Confirme sua senha</label>
      <input type="password" class="form-control" id="senha02" placeholder="Confirmação" required>
      <div class="invalid-feedback">
        Senha inválida.
      </div>
    </div>
  </div>
  <button class="btn btn-primary container" type="submit">Cadastrar</button>
</form>
</div>
<script>
// Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
    var forms = document.getElementsByClassName('needs-validation');
    // Faz um loop neles e evita o envio
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php $this->load->view('footer'); ?>