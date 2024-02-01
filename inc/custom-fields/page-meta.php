<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->add_fields( array(
      Field::make( 'text', 'crb_page_title', 'Title' ),
      Field::make( 'textarea', 'crb_page_seo_description', 'SEO Description' ),
      Field::make( 'textarea', 'crb_page_description', 'Description' ),
  ) );
}

?>