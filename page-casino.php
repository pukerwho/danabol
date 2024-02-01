<?php
/*
Template Name: Casino List
*/
?>

<?php get_header(); ?>

  <div class="mb-6">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-2"><?php the_title(); ?></h1>
    <div class="content mb-6"><?php echo carbon_get_the_post_meta("crb_page_description"); ?></div>
    <div class="card mb-6">
      <table class="w-full">
        <tbody class="flex flex-col">
          <?php 
            $casino = new WP_Query( array(
              'post_type'      => 'casino',
              'orderby'        => 'meta_value_num',
              'meta_key'       => '_crb_casino_rating',
              'posts_per_page' => -1,
            ));
            if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post(); ?>
              <?php echo get_template_part("template-parts/casino/casino-item"); ?>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </tbody>
      </table>
    </div>
  </div>

<?php get_footer(); ?>