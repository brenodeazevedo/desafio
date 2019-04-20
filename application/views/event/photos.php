<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuClient');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Fotos do evento <?php echo $photos[0]->eventName ?></h5>
        <div class="row">
            <?php foreach ($photos as $photo) : ?>
                <div class="card col-md-3 d-flex justify-content-center mb-5 text-center">
                    <a href="<?php echo $photo->url ?>">
                        <img class="card-img-top" style="height: 200px" src="<?php echo $photo->url ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?php echo form_open_multipart('events/addphoto/' . $photos[0]->eventId, [], true); ?>
            <input type='file' name='photos' size="40">
            <input type='submit' name='submit' value='Adicionar fotos' class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('base/footer');
