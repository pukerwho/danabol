<div class="relative h-full flex flex-col justify-between">
  <img src="<?php echo carbon_get_the_post_meta('crb_slot_logo'); ?>"  alt="<?php echo carbon_get_the_post_meta("crb_slot_name"); ?>" loading="lazy" class="w-full h-full aspect-square rounded-lg mb-4">
  <div class="text-center font-bold mb-2"><?php echo carbon_get_the_post_meta("crb_slot_name"); ?></div>
  <div class="flex lg:space-x-1">
    <div class="w-full lg:w-1/2 mb-2 lg:mb-0">
      <a href="<?php echo (is_single()) ? carbon_get_the_post_meta("crb_casino_link") : "/go/play/" ?>" class="w-full inline-block bg-emerald-500 text-white text-center rounded py-2"><?php _e("Грати", "treba-wp"); ?></a>
    </div>
    <div class="w-full lg:w-1/2">
      <a href="<?php the_permalink(); ?>" class="w-full inline-block border border-emerald-500 text-center rounded py-2"><?php _e("Огляд", "treba-wp"); ?></a>
    </div>
  </div>
</div>