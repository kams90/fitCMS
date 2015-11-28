<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">

            <div class="box-header with-border">
                <a href="<?php echo $return_link; ?>" type="button" class="btn btn-default btn-sm" ><i class="ion-ios-arrow-back"></i></a>
            </div>

            <?php echo form_open(current_url(), 'method="post" id="users-edit-form" class="form-horizontal" novalidate="novalidate"'); ?>

            <div class="box-body">

                <!-- login -->
                <div class="form-group">
                    <label for="login" class="col-sm-2 control-label"><?php echo lang('login'); ?></label>
                    <div class="col-sm-10">
                        <?php echo form_input('login', $user->login, array('class' => 'form-control', 'id' => 'login', 'required' => 'required')); ?>
                    </div>
                </div>

                <!-- email -->
                <div class="form-group">
                    <label for="login" class="col-sm-2 control-label"><?php echo lang('email'); ?></label>
                    <div class="col-sm-10">
                        <?php
                        $data_email = array('type' => 'email', 'name' => 'email', 'class' => 'form-control', 'id' => 'email', 'required' => 'required', 'value' => $user->email, 'placeholder' => 'test@gmail.com');
                        echo form_input($data_email);
                        ?>
                    </div>
                </div>

                <!-- name -->
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"><?php echo lang('name'); ?></label>
                    <div class="col-sm-10">
                        <?php echo form_input('name', $user->name, array('class' => 'form-control', 'id' => 'name')); ?>
                    </div>
                </div>

                <!-- password -->
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label"><?php echo lang('password'); ?></label>
                    <div class="col-sm-10">
                        <?php echo form_password('password', '', array('class' => 'form-control', 'id' => 'password')); ?>
                    </div>
                </div>

                <!-- password_repeat -->
                <div class="form-group">
                    <label for="password_repeat" class="col-sm-2 control-label"><?php echo lang('password_repeat'); ?></label>
                    <div class="col-sm-10">
                        <?php echo form_password('password_repeat', '', array('class' => 'form-control', 'id' => 'password_repeat')); ?>
                    </div>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <button class="btn btn-primary pull-right" type="submit"><i class="ion-ios-download"></i> &nbsp; <?php echo lang('save'); ?></button>
            </div><!-- /.box-footer -->

            <?php echo form_close(); ?>

        </div>
    </div>
</div>