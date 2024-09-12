</main><!-- #main -->

<div class="w-full max-w-[730px] mx-auto px-3 lg:px-0 mb-6">
  <div class="card ">
    <div class="flex items-center p-4">
      <div class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[32px]"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
      </div>
      <div class="text-sm">
        Матеріал на цій сторінці не є рекламою азартних ігор та організаторів букмекерської діяльності, а викладений виключно з метою ознайомлення. Участь в азартних іграх може викликати ігрову залежність. Дотримуйтеся правил (принципів) відповідальної гри. Тільки для осіб 21+.
      </div>
    </div>
  </div>
</div>

<footer class="bg-main-dark text-gray-200 py-4">
  <div class="container mx-auto">
    <div class="flex justify-center">
      <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => 'div',
        'menu_class' => 'menu flex border-b border-dashed border-gray-200 pb-4 mb-4'
      ]); ?> 
    </div>
    <div class="flex justify-center">
      danabol.com.ua © <?php $currentDate = new DateTime(); $year = $currentDate->format("Y"); echo $year; ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>