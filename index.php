<?php get_header(); ?>

  <div class="mb-6">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-2"><?php _e("Danabol - стратегії та тактики в слотах", "treba-wp"); ?></h1>
    <div class="text-center"><?php _e("Розказуємо, як правильно грати в ігрові автомати та показуємо найвигідніші слоти", "treba-wp"); ?></div>
  </div>
	<div class="card mb-6">
    <div class="card-title">
      📝 <?php _e("Новини та статті", "treba-wp"); ?>
    </div>
    <div>
      <?php 
        $top_post = new WP_Query( array( 
          'post_type' => 'post', 
          'posts_per_page' => 5,
        ) );
        if ($top_post->have_posts()) : while ($top_post->have_posts()) : $top_post->the_post(); 
      ?>
        <div class="border-b border-main-border px-4 py-4">
          <?php get_template_part("template-parts/posts/post-item"); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
	
<?php get_footer(); ?>