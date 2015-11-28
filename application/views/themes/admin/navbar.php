<!-- navbar -->
<div class="container-fluid nuNavbar">
    <div class="row">

        <!-- menu btn + location -->
        <div class="col-xs-9 col-sm-5 nuMenuBtn">
            <span class="menuTrigger"><i class="fa fa-bars"></i><span><?php echo $nu_title; ?></span></span>
        </div>

        <!-- logo -->
        <div class="col-xs-3 col-sm-2 text-center nuLogo">
            <a href="<?php echo $this->config->item('admin_url'); ?>">
                <img src="<?php echo $this->config->item('images_url'); ?>nucms-logo.png" alt="nuCms">
            </a>
        </div>

    </div>
</div>

<div class="clearfix hidden-xs"></div>