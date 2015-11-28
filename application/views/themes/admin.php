<!DOCTYPE html>
<html lang="pl">
    <head>
        <!-- METATAGS -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="robots" content="none">
        <meta name="googlebot" content="none">
        <meta name="Description" content="">
        <meta name="Keywords" content="">

        <title><?php echo $this->config->item('title', 'metatags').' - '.$this->config->item('version', 'metatags'); ?></title>
        <base href="<?php echo base_url(); ?>">
        <link rel="shortcut icon" href="">

        <!-- CSS STYLES -->
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/ionicons.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/animate.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/AdminLTE.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/skins/skin-blue.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/plugins/iCheck/flat/blue.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet">

        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/jQuery-2.1.4.min.js'); ?>"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <?php if ($this->uri->segment(3) == 'login' || $this->uri->segment(3) == 'remember') : ?>

    <!-- login layout --------------------------------------------------------->
    <body class="hold-transition login-page">
        <?php echo $output; ?>

    <?php else : ?>

    <!-- admin layout --------------------------------------------------------->

    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo $this->config->item('admin_url'); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>fit</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>fit</b>CMS</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- notifications ---------------------------->
                            <?php $this->load->view('themes/' . config_item('admin_theme') . '/components/notifications'); ?>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?php echo $loggedUser->email; ?></span>
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p>
                                            <?php echo $loggedUser->name; ?>
                                            <small><?php echo $loggedUser->email; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo admin_url('users/edit/'.$loggedUser->id); ?>" class="btn btn-default btn-flat"><?php echo lang('profile'); ?></a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo admin_url('auth/logout'); ?>" class="btn btn-default btn-flat"><?php echo lang('log_out'); ?></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- aside ---------------------------------------------------->
            <?php $this->load->view('themes/' . config_item('admin_theme') . '/aside'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $pageTitle; ?>
                    </h1>
                    <?php echo createBreadCrumbs($breadcrumbs); ?>
                </section>

                <!-- Main content -->
                <section class="content">

                    <?php $this->load->view('alerts'); ?>

                    <?php echo $output; ?>

                </section><!-- /.content -->

            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('version'); ?></b> <?php echo $this->config->item('version', 'metatags'); ?>
                </div>
                <strong>&copy; liteCMS 2015</strong>
            </footer>
        </div><!-- ./wrapper -->

    <?php endif; ?>

    <?php $this->load->view('themes/' . config_item('admin_theme') . '/components/modal'); ?>

        <!-- JS SCRIPTS -->
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/app.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/SmoothScroll.js'); ?>"></script>

        <!-- PLUGINS -->
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/plugins/iCheck/icheck.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>

        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/functions.js'); ?>"></script>
        <script src="<?php echo site_url('assets/themes/'.config_item('admin_theme').'/js/main.js'); ?>"></script>

        <script type="text/javascript">
        <!--
        (function () {
            if ("-ms-user-select" in document.documentElement.style && (navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/IEMobile\/11\.0/))) {
                var msViewportStyle = document.createElement("style");
                msViewportStyle.appendChild(
                        document.createTextNode("@-ms-viewport{width:auto!important}")
                        );
                document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
            }
        })();
        //-->
        </script>
    </body>
</html>