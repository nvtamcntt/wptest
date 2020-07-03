<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122664769-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122664769-3');
    </script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
<?php
$keywords = '株式会社エンジ,人材,グローバル,採用,外国人';

$cls = new ootpl_meta_ogp( $keywords );
$cls->view();
?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/safari-pinned-tab.svg" color="#1169d1">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1">
    <!--<meta name="viewport" content="width=1320"> -->

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extend.css">
    <!--[if IE 7 ]> <html class="ie7"> <![endif]--> 
    <!--[if IE 8 ]> <html class="ie8"> <![endif]--> 
    <!--[if IE 9 ]> <html class="ie9"> <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ofi.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/effect.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/flexibility.js"></script>
    
    <?php wp_head(); ?>
    
</head>
