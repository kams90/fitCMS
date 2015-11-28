<?php if ($this->session->flashdata('error')) : ?>

    <!-- Alert DANGER --------------------------------------------------------->
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('error'); ?>
    </div>

<?php endif; ?>

<?php if (validation_errors()) : ?>

    <!-- Alert VALIDATION_ERRORS ---------------------------------------------->
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo validation_errors(); ?>
    </div>

<?php endif; ?>

<?php if (isset($errors) && count($errors)) : ?>

    <!-- Alert SPECIAL ERRORS ------------------------------------------------->
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php 
            foreach ($errors as $error) {
                echo $error."<br>";
            }
        ?>
    </div>

<?php endif; ?>
    
<?php if ($this->session->flashdata('success')) : ?>

    <!-- Alert SUCCESS -------------------------------------------------------->
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('success'); ?>
    </div>

<?php endif; ?>