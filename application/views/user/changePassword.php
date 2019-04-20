<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuClient');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Mudar senha</h5>
        <ul>
            <?php echo validation_errors("<li class='text-danger'>", "</li>"); ?>
        </ul>
        <?php echo form_open('/users/changepassword') ?>
        <div class="row">
            <div class="col-md-5 col-xs-12 form-group">
                <label for="password">Senha atual</label>
                <input type="password" class="form-control" placeholder="Insira a senha" name="actualPassword" id="actualPassword" value="<?php echo $actualPassword ?>" />
            </div>
            <div class="col-md-5 col-xs-12 form-group">
                <label for="password">Nova senha</label>
                <input type="password" class="form-control" placeholder="Insira a senha" name="password" id="password" />
            </div>
            <div class="col-md-5 col-xs-12 form-group">
                <label for="passwordconf">Confirme a senha</label>
                <input type="password" class="form-control" placeholder="Confirme sua senha" name="passwordconf" id="passwordconf" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
</div>

<?php $this->load->view('base/footer'); ?>