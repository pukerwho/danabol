<?php get_header(); ?>

<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
  <div class="container mx-auto px-2 lg:px-5">
    <!-- Хлебные крошки -->
    <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <ul class="flex items-center flex-wrap">
        <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
          <a itemprop="item" href="<?php echo home_url(); ?>" class="text-white opacity-90">
            <span itemprop="name"><?php _e( 'Главная', 'tarakan' ); ?></span>
          </a>                        
          <meta itemprop="position" content="1">
        </li>
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
          <a itemprop="item" href="<?php the_permalink(); ?>" class="text-white opacity-90">
            <span itemprop="name"><?php the_title(); ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
      </ul>
    </div>
    <!-- END Хлебные крошки -->
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php the_title(); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
	<!-- Основной контент -->
	<div class="bg-white shadow-lg rounded-lg mb-12 p-8">
		<div class="font-light text-gray-700 mb-6">
			<?php _e('Дата', 'tarakan'); ?>: <span class="font-semibold text-gray-700"><?php echo get_the_date('d.m.Y') ?></span>
		</div>
		<div class="content">
			<?php the_content(); ?>	
		</div>
		
	</div>
	<!-- END Основной контент -->
</div>
	
<?php get_footer(); ?>