<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav>
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary-menu', // Tên vùng menu (cần phù hợp với tên đã đăng ký ở bước trước)
                    'menu_class'      => 'menu', // Tên lớp CSS cho menu (tuỳ chọn)
                    'container_class' => 'container_class', // Tên lớp CSS cho container (tuỳ chọn)
                )
            );
            ?>
            <div class="search">
                <figure class="img">
                    <img src="<?php echo get_theme_file_uri('/assets/images/nav/search.png') ?>" alt="search" id="search-icon">
                </figure>
                <a href="#" class="button dark-teal">
                    Join now
                </a>
            </div>
            <figure class="img right mobile menu">
                <img src="<?php echo get_theme_file_uri('/assets/images/mobile/32px-Hamburger_icon_white.svg.png') ?>" alt="menu" class="mobile menu">
            </figure>
            <!-- <h1><?php bloginfo('name'); ?></h1> -->
            <!-- <h2><?php bloginfo('description'); ?></h2> -->
        </nav>
    </header>
</body>