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

        <title>liteCMS - frontend</title>
        <base href="<?php echo base_url(); ?>">
        <link rel="shortcut icon" href="">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php echo $output; ?>

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