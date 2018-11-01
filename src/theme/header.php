<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header<?php if( !is_front_page() ) { echo '__'.get_post_type(); } ?>">
  <div class="header__container">
    <h1 class="header__logo" data-aos="fade" data-aos-duration="1000">
    <?php if( is_front_page() ) { ?>
      <a href="#home" class="header__home-link">
    <?php } else { ?>
      <a href="<?php echo get_home_url(); ?>" class="header__home-link">
    <?php } ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/header/mceg-logo@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/header/mceg-logo@2x.png 2x">
        <div class="header__site-name"><?php bloginfo( 'name' ); ?></div>
      </a>
    </h1>
    <nav class="header__nav">
      <ul class="header__menu">
        <?php print_menu('header-menu', 'header__menu'); ?>
        <?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
      </ul>
    </nav>
    <a href="#" class="header__mobile-nav-button">
      <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <line x1="0" x2="48" y1="8" y2="8" />
        <line x1="0" x2="48" y1="24" y2="24" />
        <line x1="0" x2="48" y1="40" y2="40" />
      </svg>
    </a>
  </div>
  <nav class="header__mobile-nav" style="max-height: 480px;">
    <ul class="header__mobile-menu">
      <?php print_menu('mobile-header-menu', 'header__mobile-menu'); ?>
    </ul>
  </nav>
</header>