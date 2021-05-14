<?php 
//To add onclick or other elements on menu links an ACF field is required (in the example ga_event)

function add_menu_atts( $atts, $item, $args ) {
  $event_code = get_field( 'ga_event', $item );
  if( $event_code):
  $atts['onClick'] = $event_code; //you can change onClick with all the attributs you need
  endif;
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );
