</main><!-- #main -->

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