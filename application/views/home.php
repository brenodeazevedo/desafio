<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-md-6 offset-md-3 col-xs-10 offset-xs-1">
    <div class="card center-middle login-container">
      <div class="card-body">
        <h5 class="card-title">Logar</h5>
        <h6 class="card-subtitle mb-2 text-muted">É necessário logar para continuar</h5>
          <?php if ($login_Error) : ?><span class="text-danger mb-2">Usuário ou senha incorretos</span><?php endif; ?>
          <form action="users/login" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" id="email" name="email" required class="form-control" placeholder="Email do usuário" />
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" id="password" name="password" required class="form-control" placeholder="Senha" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" />
            </div>
          </form>
      </div>
    </div>
  </div>
</div>