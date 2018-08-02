<!DOCTYPE html>
<html>
    <head>
        <title>ESMC</title>
        <?php
        wp_head();
        ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header id="header">
    <h1 id="logo">
        <a href="index.html">
            Eindhovense Studenten Motorclub
        </a>
        <a href='https://www.tue.nl/'>
            <img style='height: 30px;'  src='<?php bloginfo('stylesheet_directory'); ?>/images/logo-tue.png' alt="tue logo">
        </a>
    </h1>
    <nav id="nav">
        <?php
        wp_nav_menu(array('theme_location' => 'primary'));
        ?>
    </nav>
</header>