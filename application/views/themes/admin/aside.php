<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo lang('menu'); ?></li>
            <li>
                <a href="<?php echo admin_url(); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span><?php echo lang('dashboard'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url('pages'); ?>">
                    <i class="fa fa-file"></i>
                    <span><?php echo lang('pages'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url('users'); ?>">
                    <i class="fa fa-user"></i>
                    <span><?php echo lang('users'); ?></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i>
                    <span><?php echo lang('shop'); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> <?php echo lang('products'); ?></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> <?php echo lang('categories'); ?></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="fa fa-cog"></i>
                    <span><?php echo lang('settings'); ?></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>