<?php
$current_title = wp_get_document_title();

// FOR Main Page
if ( is_home() ) {
  $home_title = crb_get_i18n_theme_option('crb_seo_mainpage_title'); 
  $home_description = crb_get_i18n_theme_option('crb_seo_mainpage_description'); 
  if ($home_title) {
    $current_title = $home_title;
  }
  if ($home_description) {
    $current_description = $home_description;
  }
}

// FOR POSTs
if ( is_singular( 'post' ) ) {
  $post_title = carbon_get_the_post_meta('crb_post_title');
  $post_description = carbon_get_the_post_meta('crb_post_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>"/>
  <?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <?php if (is_singular()): ?>
    <meta property="og:title" content="<?php echo $current_title; ?>" />
    <?php if ($current_description): ?>
      <meta property="og:description" content="<?php echo $current_description; ?>" />
    <?php else: ?>
      <?php 
        $content_text_for_description = wp_strip_all_tags( get_the_content() );
      ?>
      <meta property="og:description" content="<?php echo mb_strimwidth($content_text_for_description, 0, 150, '...'); ?>" />
    <?php endif; ?>
    <?php if (get_the_post_thumbnail_url()): ?>
      <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <?php else: ?>
      <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/check-tarakan.png">  
    <?php endif; ?>
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <meta property="og:article:author" content="<?php echo carbon_get_the_post_meta('crb_post_author'); ?>" />
    <?php else: ?>
      <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <?php endif; ?>
  
  <?php endif; ?>
	
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="bg-main-dark text-gray-100 py-4 mb-10">
    <div class="container">
      <div class="flex items-center justify-between">
        <div>
          <a href="<?php echo get_home_url(); ?>" class="logo text-lg text-yellow-200 font-extrabold">👑 Danabol </a>
        </div>
        <div class="block lg:hidden">
          <div class="js-mobile-menu-open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </div>
          <div class="hidden js-mobile-menu-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
        <div class="hidden lg:block">
          <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'div',
            'menu_class' => 'menu flex'
          ]); ?> 
        </div>
      </div>
    </div>
  </header>

  <div class="mobile-menu -translate-x-full">
    <div>
      <?php wp_nav_menu([
        'theme_location' => 'header',
        'container' => 'div',
        'menu_class' => 'block'
      ]); ?> 
    </div>
  </div>

  <main class="main">