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

// FOR CASINO
if ( is_singular( 'casino' ) ) {
  $post_title = carbon_get_the_post_meta('crb_casino_title');
  $post_description = carbon_get_the_post_meta('crb_casino_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

// FOR SLOTS
if ( is_singular( 'slots' ) ) {
  $post_title = carbon_get_the_post_meta('crb_slot_title');
  $post_description = carbon_get_the_post_meta('crb_slot_description');
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
        <div class="relative flex items-center">
          <a href="<?php echo get_home_url(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f5e885" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
          </svg>
          <span class="logo text-lg text-yellow-200 font-extrabold">Danabol</span>
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