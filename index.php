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
  </div>

  <div class="card mb-6">
    <div class="card-title">
      🎲 <?php _e("Казино в Україні", "treba-wp"); ?>
    </div>
    <div>
      <table class="w-full table-auto">
        <thead class="bg-main-gray ">
          <tr>
            <th class="text-left whitespace-nowrap px-4 py-3">
              <div class="text-left font-bold"><?php _e("Назва", "treba-wp"); ?></div>
            </th>
            <th class="text-left whitespace-nowrap px-4 py-3">
              <div class="text-left font-bold"><?php _e("Рейтинг", "treba-wp"); ?></div>
            </th>
            <th class="text-left whitespace-nowrap px-4 py-3">
              <div class="text-left font-bold"><?php _e("Ліцензія", "treba-wp"); ?></div>
            </th>
            <th class="text-left whitespace-nowrap px-4 py-3">
              <div class="text-left font-bold"><?php _e("Спробувати", "treba-wp"); ?></div>
            </th>
          </tr>
        </thead>
        <tbody class="">
          <?php 
            $casino = new WP_Query( array(
              'post_type' => 'casino',
              'orderby' => 'rand',
              'posts_per_page' => 5,
            ));
            if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post(); ?>
              <tr class="border-b border-main-border last:border-transparent">
                <td class="whitespace-nowrap px-4 py-3">
                  <div>
                    <a href="<?php the_permalink(); ?>" class="flex items-center">
                      <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium'); if ($thumb): ?>
                      <img class="w-[35px] h-[35px] w-max-[35px] h-max-[35px]  object-cover rounded-full mr-2" alt="<?php the_title(); ?>" src="<?php echo $thumb; ?>" loading="lazy">
                      <?php endif; ?>
                      <?php the_title(); ?>
                    </a>
                  </div>
                </td>
                <td class="whitespace-nowrap px-4 py-3">
                  <div>⭐ <?php echo carbon_get_the_post_meta("crb_casino_rating"); ?></div>
                </td>
                <td class="whitespace-nowrap px-4 py-3">
                  <?php if (carbon_get_the_post_meta("crb_casino_licence")): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                  <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                  <?php endif; ?>
                </td>
                <td class="whitespace-nowrap px-4 py-3">
                  <div class="flex items-center">
                    <div class="mr-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                      </svg>
                    </div>
                    <a href="<?php echo carbon_get_the_post_meta("crb_casino_link"); ?>"><?php _e("Грати", "treba-wp"); ?>!</a>
                  </div>
                </td>
              </tr>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      🎰 <?php _e("Ігрові автомати", "treba-wp"); ?>
    </div>
    <div class="flex flex-wrap p-4 -mx-2">
      <?php 
        $top_post = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 5,
        ) );
        if ($top_post->have_posts()) : while ($top_post->have_posts()) : $top_post->the_post(); 
      ?>
        <div class="w-1/2 lg:w-1/3 px-2 mb-4">
          <?php get_template_part("template-parts/slots/item"); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
	
<?php get_footer(); ?>