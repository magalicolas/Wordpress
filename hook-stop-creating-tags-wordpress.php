<?php 
//The first checkmark prohibits the editor role from creating tags.
//It has an option that allows the second hook to display an error message (second hook).

function disallow_insert_term($term, $taxonomy) {
	$user = wp_get_current_user();
	if ( $taxonomy == 'post_tag' && in_array('editor', $user->roles) ) { //role editor cant create tags
		$option_name = 'disallow_insert_term' ; //create option
		$new_value = '1'; //initiate option
		if ( get_option( $option_name ) !== false ) {
			update_option( $option_name, $new_value ); 
		} else {
			add_option( $option_name, $new_value,);
		}
	}
}
add_action( 'pre_insert_term', 'disallow_insert_term', 10, 2);

function editor_admin_notice(){
	$check=get_option('disallow_insert_term'); //check option, if true --> go
	$user = wp_get_current_user();
	if ( in_array( 'editor', (array) $user->roles ) && $check==1 ) {
		update_option('disallow_insert_term', 0); //reset option 
		$class = 'notice notice-error';
		$message = __( "Your message is here", 'sample-text-domain' ); //custom your message
		printf( '<div class="%1$s">%2$s</div>', esc_attr( $class ), esc_html( $message ) );
	}
}
add_action('admin_notices', 'editor_admin_notice');
