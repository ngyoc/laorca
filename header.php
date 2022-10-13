<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA ORCA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');
                                    echo '?' . filemtime(get_stylesheet_directory() . '/style.css'); ?>" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <nav class="nav">
            <div class="nav-wrap">
                <div class="nav-container flex">

                    <div class="site-logo_wrap">
                        <div class="site-logo">

                            <?php if (is_front_page() && is_home()) : ?>
                                <h1><a href="<?php echo esc_url(home_url('/')); ?>" class="">LA ORCA</a></h1>
                            <?php else : ?>
                                <p><a href="<?php echo esc_url(home_url('/')); ?>" re;="home" class="">LA ORCA</a></p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php wp_nav_menu(array(
                        'theme_location'  => 'global',
                        'menu_class' => 'flex',
                        'container' => false
                    )); ?>

                    <?php get_template_part('template/link_sns'); ?>

                </div>
            </div>
        </nav>

        <nav class="nav-sp">
            <div class="nav-sp-wrap ">
                <div class="nav-sp-container container ">

                    <div class="site-logo">
                        <?php if (is_front_page() && is_home()) : ?>
                            <h1><a href="<?php echo esc_url(home_url('/')); ?>" class="no-deco t-white">LA ORCA</a></h1>

                        <?php else : ?>
                            <p><a href="<?php echo esc_url(home_url('/')); ?>" re;="home" class="no-deco t-white">LA ORCA</a></p>

                        <?php endif; ?>
                    </div>


                    <div class="drawer">
                        <input type="checkbox" class="checkbox drawer-hidden" id="drawer-check">
                        <label for="drawer-check" class="drawer-open"><span></span></label>

                        <div class="drawer-content">
                            <?php wp_nav_menu(array(
                                'theme_location'  => 'global',
                                'menu_class' => '',
                                'container' => false
                            )); ?>

                            <?php get_template_part('template/link_sns'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </nav>

    </header>

    <div class="content-wrap wrap">
        <div class="content-container container">
