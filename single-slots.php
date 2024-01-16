<?php get_header(); ?>
<?php $countNumber = tutCount(get_the_ID()); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div>  
  <div class="card mb-6">
    <div class="card-title">
      <h1 class="text-2xl lg:text-3xl font-semibold"><?php the_title(); ?></h1>
    </div>
    <div class="px-4 py-4">
      <div class="flex items-center flex-wrap lg:-mx-4 mb-4">
        <div class="w-full lg:w-1/3 lg:px-4 mb-4 lg:mb-0">
          <?php $logo = carbon_get_the_post_meta('crb_slot_logo'); if ($logo): ?>
            <img class="object-cover rounded-lg mb-4" alt="<?php the_title(); ?>" src="<?php echo $logo; ?>" loading="lazy">
          <?php endif; ?>
          <div class="flex flex-wrap justify-between lg:-mx-2">
            <div class="w-full lg:w-1/2 mb-2 lg:mb-0 lg:px-2"><a href="<?php echo carbon_get_the_post_meta("crb_slot_link"); ?>" class="w-full inline-block bg-emerald-500 text-white text-center rounded py-2"><?php _e("Грати", "treba-wp"); ?></a></div>
            <div class="w-full lg:w-1/2 lg:px-2"><a href="<?php echo carbon_get_the_post_meta("crb_slot_link"); ?>" class="w-full inline-block border border-emerald-500 text-center rounded py-2"><?php _e("Демо", "treba-wp"); ?></a></div>
          </div>
        </div>
        <div class="w-full lg:w-2/3 lg:px-4">
          <div class="mb-2"><span class="font-bold"><?php _e("Назва слота", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_slot_name"); ?></div>
          <div class="mb-2"><span class="font-bold"><?php _e("Рейтинг гравців", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_slot_rating"); ?></div>
          <div class="mb-2"><span class="font-bold"><?php _e("Дата виходу", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_slot_date"); ?></div>
          <div class="mb-2">
            <span class="font-bold"><?php _e("Розробник", "treba-wp"); ?></span>: 
            <?php 
            $providers = wp_get_post_terms(  get_the_ID() , 'providers', array( 'parent' => 0 ) );
            foreach (array_slice($providers, 0,1) as $provider):
            ?>
              <?php if ($provider): ?>
                <a href="<?php echo get_term_link($provider->term_id, 'providers') ?>" ><?php echo $provider->name; ?></a> 
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div>
            <span class="font-bold"><?php _e("Категорія", "treba-wp"); ?></span>: 
            <?php 
            $types = wp_get_post_terms(  get_the_ID() , 'slots-type', array( 'parent' => 0 ) );
            foreach (array_slice($types, 0,1) as $type):
            ?>
              <?php if ($type): ?>
                <a href="<?php echo get_term_link($type->term_id, 'slots-type') ?>" ><?php echo $type->name; ?></a> 
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="border-t border-main-border pt-4">
        <?php echo carbon_get_the_post_meta("crb_slot_opys"); ?>
      </div>
    </div>
  </div>
  <div class="flex justify-center flex-wrap mb-4">
    <div class="nav-links mb-2"><a href="#content" class="underline px-2"><?php _e("Огляд", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#where" class="underline px-2"><?php _e("Де грати", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#faq" class="underline px-2"><?php _e("FAQ", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#reviews" class="underline px-2"><?php _e("Відгуки", "treba-wp"); ?></a></div>
  </div>

  <!-- Огляд -->
  <section id="content" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("Огляд", "treba-wp"); ?>
        <div class="text-base font-light"><?php _e("Все, що потрібно знати про", "treba-wp"); ?> <?php echo carbon_get_the_post_meta("crb_slot_name"); ?></div>
      </div>

      <!-- Скрін -->
      <div class="mb-4">
        <?php $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> 
        <img src="<?php echo $large_thumb; ?>" alt="<?php the_title(); ?>" loading="lazy">
      </div>
      <!-- Скрін -->
      
      <!-- Характеристики -->
      <h3 class="text-xl font-medium px-4 mb-2">⚙️ <?php _e("Характеристики", "treb-wp"); ?></h3>
      <table class="w-full border-collapse">
        <tbody>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">📈💰 <?php _e("RTP", "treba-wp"); ?>. <a href="#"><?php _e("Що таке RTP?", "treba-wp"); ?></a></td>
            <td class="p-4"><?php echo carbon_get_the_post_meta("crb_slot_rtp"); ?>%</td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">🎢📉 <?php _e("Волатильність", "treba-wp"); ?></td>
            <td class="p-4"><?php echo carbon_get_the_post_meta("crb_slot_volatilyti"); ?></td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">🏆💰 <?php _e("Максимальний виграш", "treba-wp"); ?></td>
            <td class="p-4"><?php echo carbon_get_the_post_meta("crb_slot_maxwin"); ?></td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">➖🎰 <?php _e("Кількість ліній", "treba-wp"); ?></td>
            <td class="p-4"><?php echo carbon_get_the_post_meta("crb_slot_qtyline"); ?></td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">🔄🕹️ <?php _e("Ігрове поле", "treba-wp"); ?></td>
            <td class="p-4"><?php echo carbon_get_the_post_meta("crb_slot_gamepole"); ?></td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">🌐🌍 <?php _e("Мова", "treba-wp"); ?></td>
            <td class="p-4"><?php $lang_array = carbon_get_the_post_meta("crb_slot_lang"); foreach ($lang_array as $lang): ?> <?php echo $lang; ?>;  <?php endforeach; ?></td>
          </tr>
          <tr class="border-b border-main-border">
            <td class="font-medium p-4">🌟🔥 <?php _e("Популярність", "treba-wp"); ?></td>
            <td class="p-4">
              <?php $slot_popular = carbon_get_the_post_meta("crb_slot_popular"); ?>
              <div class="relative bg-gray-300 rounded-xl py-1">
                <div class="relative text-center text-sm z-1" style="width:<?php echo $slot_popular; ?>%">
                  <?php if ($slot_popular >= 90) {
                    echo "Дуже популярна гра";
                  } elseif ($slot_popular >= 80) {
                    echo "Популярна гра";
                  } else {
                    echo "Не дуже популярна гра";
                  } ?>
                </div>
                <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $slot_popular; ?>%"></div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="border-b border-main-border p-4">
        <h3 class="text-xl font-medium mb-2"><?php _e("Правила та стратегія гри", "treb-wp"); ?></h3>
        <div class="content">
          <?php $rules = carbon_get_the_post_meta("crb_slot_rules"); echo apply_filters( 'the_content', $rules  ); ?>
        </div>
      </div>

      <!-- Переваги та Недоліки -->
      <div class="border-b border-main-border p-4">
        <h3 class="text-xl font-medium mb-2"><?php _e("Переваги", "treb-wp"); ?></h3>
        <div class="mb-4">
          <ul>
            <?php 
              $pros = carbon_get_the_post_meta("crb_slots_pros"); 
              foreach ($pros as $pros_item):
            ?>
              <li class="mb-1"><span class="w-[10px] h-[10px] inline-block rounded-full bg-emerald-400 mr-3"></span><?php echo $pros_item["crb_slots_pros_item"]; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <h3 class="text-xl font-medium mb-2"><?php _e("Недоліки", "treba-wp"); ?></h3>
        <div>
          <ul>
            <?php 
              $pros = carbon_get_the_post_meta("crb_slots_cons"); 
              foreach ($pros as $pros_item):
            ?>
              <li class="mb-1"><span class="w-[10px] h-[10px] inline-block rounded-full bg-red-400 mr-3"></span><?php echo $pros_item["crb_slots_cons_item"]; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <!-- Оцінки -->
      <div class="p-4">
        <h3 class="text-xl font-medium mb-2">⭐ <?php _e("Оцінки", "treb-wp"); ?></h3>
        <div class="flex flex-wrap lg:-mx-4">
          <div class="w-full lg:w-1/2 lg:px-4 mb-4">
            <?php $rating_gameplay = carbon_get_the_post_meta("crb_slot_rating_gameplay"); ?>
            <div class="flex items-cente justify-between mb-2">
              <div><?php _e("Геймплей", "treba-wp"); ?></div>
              <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_gameplay; ?></div>
            </div>
            <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_gameplay; ?>%"></div></div>
          </div>
          <div class="w-full lg:w-1/2 lg:px-4 mb-4">
            <?php $rating_design = carbon_get_the_post_meta("crb_slot_rating_design"); ?>
            <div class="flex items-cente justify-between mb-2">
              <div><?php _e("Дизайн та графіка", "treba-wp"); ?></div>
              <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_design; ?></div>
            </div>
            <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_design; ?>%"></div></div>
          </div>
          <div class="w-full lg:w-1/2 lg:px-4 mb-4">
            <?php $rating_audio = carbon_get_the_post_meta("crb_slot_rating_audio"); ?>
            <div class="flex items-cente justify-between mb-2">
              <div><?php _e("Звукові ефекти", "treba-wp"); ?></div>
              <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_audio; ?></div>
            </div>
            <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_audio; ?>%"></div></div>
          </div>
          <div class="w-full lg:w-1/2 lg:px-4 mb-4">
            <?php $rating_bonus = carbon_get_the_post_meta("crb_slot_rating_bonus"); ?>
            <div class="flex items-cente justify-between mb-2">
              <div><?php _e("Бонуси та фічі", "treba-wp"); ?></div>
              <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_bonus; ?></div>
            </div>
            <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_bonus; ?>%"></div></div>
          </div>
        </div>
        <div class="w-full">
          <?php $rating = round(($rating_gameplay + $rating_design + $rating_audio + $rating_bonus)/4); ?>
          <div class="flex items-cente justify-between mb-2">
            <div><?php _e("Загальна оцінка", "treba-wp"); ?></div>
            <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating; ?></div>
          </div>
          <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating; ?>%"></div></div>
        </div>
      </div>
    </div>
  </section>
  <section id="where" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("Де грати", "treba-wp"); ?>
        <div class="text-base font-light"><?php _e("Рейтинг казино", "treba-wp"); ?>, <?php _e("де можна грати в", "treba-wp"); ?> <?php echo carbon_get_the_post_meta("crb_slots_name"); ?></div>
      </div>
      <div class="">
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
                      <a href="#"><?php _e("Грати", "treba-wp"); ?>!</a>
                    </div>
                  </td>
                </tr>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section id="faq" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("FAQ", "treba-wp"); ?>
        <div class="text-base font-light"><?php _e("Питання та відповіді", "treba-wp"); ?></div>
      </div>
      <div itemscope itemtype="https://schema.org/FAQPage" class="p-4">
        <?php 
        $faqs = carbon_get_the_post_meta('crb_slot_faq');
        foreach( $faqs as $faq ): ?>
          <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-3 last-of-type:mb-0">
            <summary class="zag" itemprop="name">
              <?php echo $faq['crb_slot_faq_question'] ?>	
            </summary> 
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="bg-gray-100 rounded-lg mt-2 p-4">
              <div itemprop="text">
                <p><?php echo $faq['crb_slot_faq_answer'] ?></p>
              </div>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="reviews" class="mb-6">
    <div class="card">
      <div class="card-title">
        📣 <?php _e("Коментарі", "treba-wp"); ?>
      <div class="text-base font-light"><?php _e("Ви можете поділитися своєю думкою або поставити запитання", "treba-wp"); ?></div>
      </div>
      <div>
        <?php comments_template(); ?>
      </div>
    </div>
  </section>
  <div class="breadcrumbs text-sm mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <ul class="flex items-center flex-wrap">
      <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-4 pl-8">
        <a itemprop="item" href="<?php echo home_url(); ?>">
          <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
        </a>                        
        <meta itemprop="position" content="1">
      </li>
      <?php 
      $post_categories = wp_get_post_categories( get_the_ID(), array('fields' => 'all') );
      foreach (array_slice($post_categories, 0,1) as $post_category): ?>
        <?php if ($post_category): ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item mr-4" >
          <a itemprop="item" href="<?php echo get_category_link($post_category->term_id) ?>">
            <span itemprop="name"><?php echo $post_category->name; ?></span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
        <span itemprop="name"><?php the_title(); ?></span>
        <meta itemprop="position" content="3" />
      </li>
    </ul>
  </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer();