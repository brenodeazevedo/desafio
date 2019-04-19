<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Criar usuário</h5>
        <form action="/users/createConfirm">
            <div class="row">
                <div class="col form-group">
                    <label for="firstName">Nome</label>
                    <input type="text" class="form-control" placeholder="Insira o nome" name="firstName" id="firstName" />
                </div>
                <div class="col form-group">
                    <label for="lastName">Sobrenome</label>
                    <input type="text" class="form-control" placeholder="Insira o sobrenome" name="lastName" id="lastName" />
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Insira o email" name="email" id="email" />
                </div>
                <div class="col form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" placeholder="Insira a senha" name="password" id="password" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
</div>