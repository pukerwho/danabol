<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_author', 'Автор' ),
      Field::make( 'text', 'crb_post_author_instagram', 'Інстаграм автора' ),
      Field::make( 'text', 'crb_post_author_facebook', 'Фейсбук автора' ),
      Field::make( 'text', 'crb_post_title', 'Title' ),
      Field::make( 'textarea', 'crb_post_description', 'Description' ),
      Field::make( 'text', 'crb_post_keywords', 'Keywords' ),
      Field::make( 'checkbox', 'crb_post_mainhide', 'Не виводити на головній сторінці' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'slots' )
    ->add_fields( array(
      Field::make( 'text', 'crb_slot_link', 'Посилання' ),
      Field::make( 'text', 'crb_slots_name', 'Назва гри' ),
      Field::make( 'text', 'crb_slots_date', 'Дата створення' ),
  ) );
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'casino' )
    ->add_fields( array(
      Field::make( 'text', 'crb_casino_link', 'Посилання' ),
      Field::make( 'text', 'crb_casino_rating', 'Рейтинг' ),
      Field::make( 'checkbox', 'crb_casino_licence', 'Ліцензія' ),
      Field::make( 'complex', 'crb_casino_bonuses', 'Бонуси' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_bonus', 'Бонус' ),
      ) ),
      Field::make( 'complex', 'crb_casino_pros', 'Переваги' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_pros_item', 'Перевага' ),
      ) ),
      Field::make( 'complex', 'crb_casino_cons', 'Недоліки' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_cons_item', 'Недолік' ),
      ) ),
      
  ) );
}

?>