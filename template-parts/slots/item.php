<div class="relative h-full flex flex-col justify-between">
  <div class="relative">
    <!-- Slot thumb -->
    <img src="<?php echo carbon_get_the_post_meta('crb_slot_logo'); ?>"  alt="<?php echo carbon_get_the_post_meta("crb_slot_name"); ?>" loading="lazy" class="w-full h-full lg:h-[175px] object-cover rounded-lg mb-2">
    <!-- Slot rtp -->
    <div class="absolute right-0 top-0 bg-yellow-200 rounded px-2 py-1">RTP: <?php echo carbon_get_the_post_meta("crb_slot_rtp"); ?>%</div>
  </div>
  <!-- Name slot -->
  <div class="mb-1"><a href="<?php the_permalink(); ?>" class="text-sm"><?php echo carbon_get_the_post_meta("crb_slot_name"); ?></a></div>
  <!-- Name provider -->
  <div class="text-sm mb-2">
    <span class="font-bold"><?php _e("Розробник", "treba-wp"); ?>: </span>
    <?php 
    $providers = wp_get_post_terms(  get_the_ID() , 'providers', array( 'parent' => 0 ) );
    foreach (array_slice($providers, 0,1) as $provider):
    ?>
      <?php if ($provider): ?>
        <a href="<?php echo get_term_link($provider->term_id, 'providers') ?>" ><?php echo $provider->name; ?></a> 
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  
  <div class="flex lg:space-x-1">
    <div class="w-full lg:w-1/2 mb-2 lg:mb-0">
      <a href="<?php echo (is_single()) ? carbon_get_the_post_meta("crb_casino_link") : "/go/play/" ?>" class="w-full inline-block bg-emerald-500 text-white text-center rounded py-2"><?php _e("Грати", "treba-wp"); ?></a>
    </div>
    <div class="w-full lg:w-1/2">
      <a href="<?php the_permalink(); ?>" class="w-full inline-block border border-emerald-500 text-center rounded py-2"><?php _e("Огляд", "treba-wp"); ?></a>
    </div>
  </div>
</div>