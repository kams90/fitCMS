<!-- search input -->
<div class="has-feedback">

    <?php echo form_open(current_url(), 'method="get"'); ?>

    <?php
        $data = array('name' => 'string', 'class' => 'form-control', 'value' => $this->input->get('string'), 'placeholder' => lang('search'));
        echo form_input($data);
    ?>
    <span class="glyphicon glyphicon-search form-control-feedback"></span>

    <?php echo form_close(); ?>

</div>