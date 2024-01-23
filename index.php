<?php get_header(); ?>

  <div class="mb-6">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-2"><?php _e("Danabol - ваш провідник у світ азартних ігор", "treba-wp"); ?></h1>
    <div class="text-center"><?php _e("Пояснюємо на пальцах так, що розбереться навіть ваша мама", "treba-wp"); ?></div>
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
    <div class="p-4">
      <a href="<?php echo get_page_url("page-blog"); ?>" class="w-full inline-block bg-main-border text-center rounded uppercase px-4 py-2"><?php _e("Всі статті", "treba-wp"); ?></a>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      🎲 <?php _e("Казино в Україні", "treba-wp"); ?>
    </div>
    <div>
      <table class="w-full">
        <tbody class="flex flex-col">
          <?php 
            $casino = new WP_Query( array(
              'post_type' => 'casino',
              'orderby' => 'rand',
              'posts_per_page' => 5,
            ));
            if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post(); ?>
              <?php echo get_template_part("template-parts/casino/casino-item"); ?>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </tbody>
      </table>
    </div>
    <div class="p-4">
      <a href="/casino/" class="w-full inline-block bg-main-border text-center rounded uppercase px-4 py-2"><?php _e("Всі казино", "treba-wp"); ?></a>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      🎰 <?php _e("Ігрові автомати", "treba-wp"); ?>
    </div>
    <div class="flex flex-wrap border-b border-main-border px-4 pt-4 pb-2 -mx-2">
      <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 12,
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
      ?>
        <div class="w-1/2 lg:w-1/3 px-2 mb-4">
          <?php get_template_part("template-parts/slots/item"); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="p-4">
      <a href="/slots/" class="w-full inline-block bg-main-border text-center rounded uppercase px-4 py-2"><?php _e("Всі слоти", "treba-wp"); ?></a>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      💬 <?php _e("Коментарі гравців", "treba-wp"); ?>
    </div>
    <div>
      <?php 
        $args_comment = array(
          'status' => 'approve'
        );
        $comments = get_comments( $args_comment );
        foreach ($comments as $comment):
      ?>
        <div class="border-b border-main-border last:border-transparent p-4">
          <div>
            <span class="font-semibold"><?php echo get_comment_author(); ?></span> 👉 <a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>" ><?php echo get_the_title($comment->comment_post_ID); ?></a>
          </div>
          <div><?php $comment_text = wp_strip_all_tags(get_comment_text()); echo mb_strimwidth($comment_text, 0, 100, '...'); ?> <a href="<?php echo get_comment_link(); ?>"><?php _e("читати далі", "treba-wp"); ?></a></div>
          <div class="hidden"><?php echo time_ago($comment->comment_date); ?></div>
        </div>
        
      <?php endforeach; ?>
    </div>
	
<?php get_footer(); ?>