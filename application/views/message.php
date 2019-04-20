<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
if (isAdmin()) {
    $this->load->view('base/menuAdmin');
} else {
    $this->load->view('base/menuClient');
}
?>
<div class="card main-container">
    <div class="card-body">
        <div class="alert alert-<?php echo $type ?>">
            <?php echo $message ?>
        </div>
        <a class="btn btn-primary" href="<?php echo $url ?>"><i class="fas fas-arrow-left"></i> Voltar</a>
    </div>
</div>

<?php $this->load->view('base/footer'); ?>