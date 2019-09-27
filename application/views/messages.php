<?php if($this->session->has_userdata('Success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <?= $this->session->flashdata('Success')?>
    </div>
<?php } ?>