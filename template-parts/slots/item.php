<div class="relative">
  <a href="<?php the_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-1"></a>
  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"  alt="<?php echo carbon_get_the_post_meta("crb_slots_name"); ?>" loading="lazy" class="w-full h-full mb-2">
  <div class="text-center font-bold"><?php echo carbon_get_the_post_meta("crb_slots_name"); ?></div>
</div>