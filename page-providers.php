<?php
/*
Template Name: Providers List
*/
?>

<?php get_header(); ?>

  <div class="mb-6">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-2"><?php the_title(); ?></h1>
    <div class="content mb-6"><?php echo carbon_get_the_post_meta("crb_page_description"); ?></div>
    <div class="mb-6">
      <?php
      $providers = get_terms( array( 
        'taxonomy' => 'providers', 
        'parent' => 0, 
      )); foreach ($providers as $provider){ ?>
        <div class="card">
          <div class="card-title">
            <?php echo $provider->name; ?>
          </div>
          <div class="flex flex-wrap border-b border-main-border px-4 pt-4 pb-0 -mx-2">
            <?php 
              $slots = new WP_Query( array( 
                'post_type' => 'slots', 
                'posts_per_page' => 6,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'providers',
                    'terms' => $provider->term_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  )
                ),
              ) );
              if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
            ?>
              <div class="w-1/2 lg:w-1/3 px-2 mb-4">
                <?php get_template_part("template-parts/slots/item"); ?>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
          <div class="p-4">
            <a href="<?php echo get_term_link($provider->term_id, 'providers') ?>" class="w-full inline-block bg-main-border text-center rounded uppercase px-4 py-2"><?php _e("Інші ігри", "treba-wp"); ?> (<?php echo $provider->count; ?>)</a>
          </div>
        </div>
        
        
      <?php } ?>
    </div>
  </div>

<?php get_footer(); ?>