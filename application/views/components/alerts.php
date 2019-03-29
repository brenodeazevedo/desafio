<?php if($this->session->has_userdata('success')): ?>
<div class="alert alert-success container">
    <?= $this->session->userdata('success'); ?>
</div>
<?php endif; ?>

<?php if($this->session->has_userdata('error')): ?>
<div class="alert alert-danger container">
    <?= $this->session->userdata('error'); ?>
</div>
<?php endif; ?>



<style>

.alert {
        padding: 20px 0 20px 10px;
        margin-bottom: 30px;
        background-color: rgba(240,240,240,6);
        font-weight: 500;
        font-size: 1.1em;
    }

    .alert-success {
        color: rgb(0,200,0);
    }

    .alert-danger {
        color: red;
    }

</style>
