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
    ->where( 'post_type', '=', 'rating' )
    ->add_fields( array(
      Field::make( 'association', 'crb_rating_our_place', 'Наш вибір')
      ->set_types( array(
        array(
          'type'      => 'post',
          'post_type' => 'places',
        )
      ) )
  ) );
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'places' )
    ->add_fields( array(
      Field::make( 'checkbox', 'crb_place_close', 'Закрито/Не працює' ),
      Field::make( 'media_gallery', 'crb_place_photos', 'Фотографії' )->set_type( array( 'image' ) ),
      Field::make( 'text', 'crb_place_url', 'Url сайта' ),
      Field::make( 'text', 'crb_place_address', 'Адрес' ),
      Field::make( 'text', 'crb_place_email', 'Email' ),
      Field::make( 'text', 'crb_place_phones', 'Телефоны' ),
      Field::make( 'complex', 'crb_place_other', 'Інші' )->add_fields( array(
          Field::make( 'text', 'crb_place_other_address', 'Адрес' ),
          Field::make( 'text', 'crb_place_other_phone', 'Телефон' ),
      )),
      Field::make( 'text', 'crb_place_rating', 'Рейтинг места' ),
      Field::make( 'text', 'crb_place_reviews_count', 'Кол-во отзывов' ),
      Field::make( 'text', 'crb_place_views_count', 'Кол-во просмотров' ),
      Field::make( 'text', 'crb_place_price', 'Средний чек' ),
      Field::make( 'text', 'crb_finansyvannya', 'Форма собственности' ),

      Field::make( 'text', 'crb_cafe_parking', 'Паркинг' ),
      Field::make( 'text', 'crb_cafe_wifi', 'Wi-fi' ),
      Field::make( 'text', 'crb_cafe_banket', 'Банкет' ),
      Field::make( 'text', 'crb_cafe_onlinemenu', 'Онлайн меню' ),
      Field::make( 'text', 'crb_cafe_letnyayaploshadka', 'Летняя площадка' ),
      Field::make( 'text', 'crb_cafe_zhivayamuzika', 'Живая музыка' ),
      Field::make( 'text', 'crb_cafe_kalyan', 'Кальян' ),
      Field::make( 'text', 'crb_cafe_vipkomnati', 'VIP-комната' ),
      Field::make( 'text', 'crb_cafe_bizneslanch', 'Бизнес ланч' ),
      Field::make( 'text', 'crb_cafe_dostavka', 'Доставка' ),
      Field::make( 'text', 'crb_cafe_covidsafe', 'Антиковидные ограничения' ),
      Field::make( 'text', 'crb_cafe_detskayakomnata', 'Детская комната' ),
      Field::make( 'text', 'crb_cafe_korporativ', 'Корпоративы' ),
      Field::make( 'text', 'crb_cafe_svadba', 'Свадьбы' ),
      Field::make( 'text', 'crb_cafe_beznal', 'Безналичный расчет' ),

      // Для школи
      Field::make( 'html', 'crb_heading_school', __( 'Template School' ) )->set_html( sprintf( '<b>Для школи</b>' ) ),
      Field::make( 'text', 'crb_template_school', 'Шаблон школи' ),
      Field::make( 'text', 'crb_school_forma_navchannya', 'Форма навчання' ),
      Field::make( 'text', 'crb_school_vchitelya_nauvishchoi_category', 'Сертифіковані педагоги' ),
      Field::make( 'text', 'crb_school_ohorona', 'Охорона' ),
      Field::make( 'text', 'crb_school_medichna_dopomoga', 'Медична допомога' ),
      Field::make( 'text', 'crb_school_videospoctrereghennya', 'Видеонаблюдение' ),
      Field::make( 'text', 'crb_school_dopolnitelnie_kruzhki', 'Додаткові гуртки' ),
      Field::make( 'text', 'crb_school_repetitorstvo', 'Репетиторство' ),
      Field::make( 'text', 'crb_school_stolovaya', 'Столовая' ),
      Field::make( 'text', 'crb_school_ychastvolimpiadah', 'Участь в олімпіадах' ),
      Field::make( 'text', 'crb_school_sportivny_dosyagnennya', 'Спортивні досягнення' ),
      Field::make( 'text', 'crb_school_pogliblene_vivchannya_matematiky', 'Поглиблене вивчення математики' ),
      Field::make( 'text', 'crb_school_pogliblene_vuvchannya_angliyskoyi', 'Поглиблене вивчення англійської мови' ),
      Field::make( 'text', 'crb_school_pidgotovka_do_dpa_zno', 'Підготовка до ДПА та ЗНО' ),
      Field::make( 'text', 'crb_school_druga_inozemna_mova', 'Можливість вивчати другу іноземну мову' ),
      Field::make( 'text', 'crb_school_postiyniy_syprovid_klasnogo_kerivnyka', 'Постійний супровід класного керівника' ),
      Field::make( 'text', 'crb_school_bezkostovni_pidruchnyki', 'Безкоштовні підручники' ),
      Field::make( 'text', 'crb_school_finansova_gramotnist', 'Фінансова грамотність' ),
      Field::make( 'text', 'crb_school_suchasne_osnaschennya_klasiv', 'Сучасне оснащення класів' ),
      Field::make( 'text', 'crb_school_suchasni_navchalni_materialy', 'Сучасні навчальні матеріали, підручники' ),
      Field::make( 'text', 'crb_school_edyna_it_platforma', 'Єдина IT-платформа' ),
      Field::make( 'text', 'crb_school_systema_motivaciy', 'Система мотивації' ),

      // Для садочка
      Field::make( 'html', 'crb_heading_author', __( 'Template SAD' ) )->set_html( sprintf( '<b>Для садочка</b>' ) ),
      Field::make( 'text', 'crb_template_sad', 'Шаблон садочки' ),
      Field::make( 'text', 'crb_sad_free', 'Чи є вільні місця?' ),
      Field::make( 'text', 'crb_sad_kylinariya', 'Кулінарія' ),
      Field::make( 'text', 'crb_sad_maluvannya', 'Малювання' ),
      Field::make( 'text', 'crb_sad_music', 'Музика' ),
      Field::make( 'text', 'crb_sad_khoreogrphiya', 'Хореографія' ),
      Field::make( 'text', 'crb_sad_aktorska_maystrenist', 'Акторська майстерність' ),
      Field::make( 'text', 'crb_sad_aplication', 'Аплікація' ),
      Field::make( 'text', 'crb_sad_vokal', 'Вокал' ),
      Field::make( 'text', 'crb_sad_kazkoterapiya', 'Казкотерапія' ),
      Field::make( 'text', 'crb_sad_lego_construyuvannya', 'Лего-конструювання' ),
      Field::make( 'text', 'crb_sad_lipka', 'Ліпка' ),
      Field::make( 'text', 'crb_sad_logic', 'Логіка' ),
      Field::make( 'text', 'crb_sad_sensorica', 'Сенсорика' ),
      Field::make( 'text', 'crb_sad_gymnastick', 'Гімнастика' ),
      Field::make( 'text', 'crb_sad_dytyachiy_fitness', 'Дитячий фітнес' ),
      Field::make( 'text', 'crb_sad_tanci', 'Танці' ),
      Field::make( 'text', 'crb_sad_football', 'Футбол' ),
      Field::make( 'text', 'crb_sad_logoped', 'Логопед' ),
      Field::make( 'text', 'crb_sad_licar', 'Медичний супровід' ),
      Field::make( 'text', 'crb_sad_ohorona', 'Охорона' ),
      Field::make( 'text', 'crb_sad_doshkilna_pidgotovka', 'Підготовка до школи' ),
      Field::make( 'text', 'crb_sad_psycholog', 'Психолог' ),
      Field::make( 'text', 'crb_sad_videonaglyad', 'Відеонагляд для батьків' ),
      Field::make( 'text', 'crb_sad_okrema_territoriya', 'Окрема територія' ),

      // Для універа
      Field::make( 'html', 'crb_heading_univer', __( 'Template Univer' ) )->set_html( sprintf( '<b>Для універа</b>' ) ),
      Field::make( 'text', 'crb_template_univer', 'Шаблон універа' ),
      Field::make( 'text', 'crb_univer_type', 'Тип універа' ),
      Field::make( 'text', 'crb_univer_yroven_akkreditacii', 'Рівень акредитації' ),
      Field::make( 'text', 'crb_univer_forma_obucheniya', 'Форма навчання' ),
      Field::make( 'text', 'crb_univer_kvalifikatciya', 'Кваліфікація' ),
      Field::make( 'text', 'crb_univer_stoimost', 'Вартість' ),
      Field::make( 'text', 'crb_univer_kol_vo_studentov', 'Кіл-сть студентів' ),
      Field::make( 'text', 'crb_univer_besplatnoe_obushenie', 'Безкоштовне навчання' ),
      Field::make( 'text', 'crb_univer_platnoe_obushenie', 'Платне навчання' ),
      Field::make( 'text', 'crb_univer_aspirantura', 'Аспірантура' ),
      Field::make( 'text', 'crb_univer_voenka', 'Військова кафедра' ),
      Field::make( 'text', 'crb_univer_obsheghitie', 'Гуртожиток' ),
      // Field::make( 'text', 'crb_univer_', '' ),
      // Field::make( 'text', 'crb_univer_', '' ),
      // Field::make( 'text', 'crb_univer_', '' ),
      
  ) );
}

?>