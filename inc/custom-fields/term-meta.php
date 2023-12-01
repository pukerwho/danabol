<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
    ->add_fields( array(
      Field::make( 'image', 'crb_city_img', 'Заглавная картинка' )->set_value_type( 'url'),
      Field::make( 'rich_text', 'crb_city_seo_text', 'SEO текст' ),
      Field::make( 'html', 'crb_heading_seo', __( 'SEO Heading' ) )->set_html( sprintf( '<b>SEO</b>' ) ),
      Field::make( 'text', 'crb_category_heading', 'h1' ),
      Field::make( 'text', 'crb_category_title', 'Title' ),
      Field::make( 'textarea', 'crb_category_description', 'Description' )->set_attribute( 'maxLength', '144' ),
      // Field::make( 'textarea', 'crb_category_keywords', 'Keywords' ),
    ));
}

?>