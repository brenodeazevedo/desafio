<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuAdmin');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Criar usuário</h5>
        <ul>
            <?php echo validation_errors("<li class='text-danger'>", "</li>"); ?>
        </ul>
        <?php echo form_open(!empty($edit) ? '/users/edit/' . $idEditing : '/users/create') ?>
        <div class="row">
            <div class="col form-group">
                <label for="firstName">Nome</label>
                <input type="text" class="form-control" placeholder="Insira o nome" name="firstName" id="firstName" value="<?php echo $data['firstName'] ?>" />
            </div>
            <div class="col form-group">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" placeholder="Insira o sobrenome" name="lastName" id="lastName" value="<?php echo $data['lastName'] ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Insira o email" name="email" id="email" value="<?php echo $data['email'] ?>" />
            </div>
            <div class="col form-group">
                <label for="birthdate">Data de nascimento</label>
                <input type="date" class="form-control" placeholder="Insira a data de nascimento" name="birthdate" id="birthdate" value="<?php echo $data['birthdate'] ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" placeholder="Insira a senha" name="password" id="password" />
            </div>
            <div class="col form-group">
                <label for="passwordconf">Confirme a senha</label>
                <input type="password" class="form-control" placeholder="Confirme sua senha" name="passwordconf" id="passwordconf" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
</div>

<?php $this->load->view('base/footer'); ?>