add_filter( 'gform_pre_render_3', 'function_name' ); //_3 ID form
add_filter( 'gform_pre_validation_3', 'function_name' ); //_3 ID form
add_filter( 'gform_pre_submission_filter_3', 'function_name' ); //_3 ID form
add_filter( 'gform_admin_pre_render_3', 'function_name' ); //_3 ID form

function function_name( $form ) {
foreach ( $form['fields'] as &$field ) {

if( $field['id'] == 4 ) { //ID field of form

$acf_field_key = "field_5edf1b7c5e574"; //identifiant of field ACF
$acf_field = get_field_object($acf_field_key);
$choices = array(); // Set up blank array

if( $acf_field ) {

foreach( $acf_field['choices'] as $k => $v ) {
$choices[] = array( 'text' => $v, 'value' => $k );
}
}

$field->placeholder = '-- Select --'; //optional

$field->choices = $choices;

}
}
return $form;
}
