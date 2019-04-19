<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuAdmin');
?>
<div class="card main-container">
    <div class="card-body">
        <div class="alert alert-<?php echo $type ?>">
            <?php echo $message ?>
        </div>
        <a class="btn btn-primary" href="/users"><i class="fas fas-arrow-left"></i> Voltar</a>
    </div>
</div>

<?php $this->load->view('base/footer'); ?>