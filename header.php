<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?></title>

  <link rel='dns-prefetch' href='https://fonts.googleapis.com' />
  <link rel='dns-prefetch' href='https://cdnjs.cloudflare.com' />

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-grid.min.css" />

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <main>

    <header class="header py-3">
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="logo">
            <a href="<?php echo get_option('home'); ?>/">
              <?php bloginfo('name'); ?>
            </a>
          </div>

          <form role="search" action="<?php echo get_option('home'); ?>/" method="get">
            <div class="header-search">
              <label for="search-form" class="d-none"><?php echo _x( 'Search for:', 'label' ) ?></label>
              <input type="text" name="s" id="search-form" value="<?php the_search_query(); ?>" />
              <button type="submit"><i class="icon-search"></i></button>
            </div>
          </form>
        </div>
      </div>
    </header>
