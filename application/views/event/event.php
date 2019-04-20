<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuClient');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Eventos do arena</h5>
        <div class="row">
            <?php foreach ($events as $event) : ?>
                <div class="card col-3 mr-3 text-center">
                    <a href="events/photos/<?php echo $event->id ?>">
                        <img class="card-img-top" style="height: 120px" src="<?php echo $event->mainPhoto ?>">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $event->name ?></h6>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
$this->load->view('base/footer');
?>