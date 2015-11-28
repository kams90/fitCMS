<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo $this->config->item('admin_url'); ?>"><?php echo $this->config->item('title', 'metatags'); ?></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <?php $this->load->view('alerts'); ?>

        <?php echo form_open(current_url(), 'method="post"').PHP_EOL; ?>

            <div class="form-group has-feedback">
                <?php
                $loginParams = array('type' => 'text', 'name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => lang('login'), 'value' => set_value('email'));
                echo form_input($loginParams);
                ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php
                $passwordParams = array('type' => 'password', 'name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => lang('password'));
                echo form_input($passwordParams);
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('log_in'); ?></button>
                </div><!-- /.col -->
            </div>

        <?php echo form_close().PHP_EOL; ?>


        <?php echo anchor(site_url(config_item('admin_folder')), lang('remind_password')); ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>