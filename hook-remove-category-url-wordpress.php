<?php 
function remove_category( $string, $type ) {
  if ( $type != 'single' && $type == 'category' && ( strpos( $string, 'category' ) !== false ) ) {
    $url_without_category = str_replace( "/category/", "/", $string );
    return trailingslashit( $url_without_category );
  }
 return $string;
}
add_filter( 'user_trailingslashit', 'remove_category', 100, 2);
