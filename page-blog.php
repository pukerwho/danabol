<?php
/*
Template Name: БЛОГ
*/
?>

<?php get_header(); ?>

<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
  <div class="container mx-auto px-2 lg:px-5">
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php _e("Все публикации", "tarakan"); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <div class="flex flex-wrap -mx-2">
      <?php 
      global $wp_query, $wp_rewrite;  
      $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
      $blogs = new WP_Query( array(
        'post_type' => 'post',
        'orderby' => 'date',
        'paged' => $current,
        'posts_per_page' => 18,
      ));
      if ($blogs->have_posts()) : while ($blogs->have_posts()) : $blogs->the_post(); ?>
        <div class="w-full lg:w-1/3 mb-6 lg:px-4">
          <div class="h-full border border-gray-300 rounded">
            <div class="h-52 mb-4">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-t">
            </div>
            <div class="text-lg font-semibold text-gray-700 px-4 mb-3">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </div>
            <div class="text-sm font-light text-gray-700 px-4 mb-3">
              <?php 
                $content_text = wp_strip_all_tags( get_the_content() );
                echo mb_strimwidth($content_text, 0, 105, '...');
              ?>
            </div>
            <div class="flex items-center text-gray-700 text-sm px-4 pb-4">
              <div class="border-r pr-4 mr-4">
                <?php echo get_the_date('d.m.Y'); ?>
              </div>
              <div class="flex items-center">
                <div class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </div>
                <div>
                  <?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="b_pagination text-center">
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format'  => 'page/%#%',
          'total' => $blogs->max_num_pages,
          'current' => $current,
          'prev_next' => true,
          'next_text' => (''),
          'prev_text' => (''),
        )); 
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>