<?php
/*
Template Name: Slots List
*/
?>

<?php 
  get_header(); 
  $currentID = get_the_ID();
?>

  <div class="mb-6">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-2"><?php the_title(); ?></h1>
    <div class="content mb-6"><?php echo carbon_get_the_post_meta("crb_page_description"); ?></div>
    <div class="mb-4">
      <?php
      $types = get_terms( array( 
        'taxonomy' => 'slots-type', 
        'parent' => 0, 
      )); foreach ($types as $type){ ?>
        <a href="<?php echo get_term_link($type->term_id, 'slots-type') ?>" class="inline-block bg-white text-black rounded px-2 lg:px-4 py-2 mr-2 mb-2 lg:mb-0"><?php echo $type->name; ?></a> 
      <?php } ?>
    </div>
    <div class="card mb-6">
      <div class="flex flex-wrap border-b border-main-border px-4 pt-4 pb-0 -mx-2">
        <?php 
          $slots = new WP_Query( array( 
            'post_type' => 'slots', 
            'posts_per_page' => -1,
          ) );
          if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
        ?>
          <div class="w-1/2 lg:w-1/3 px-2 mb-4">
            <?php get_template_part("template-parts/slots/item"); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>