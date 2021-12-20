add_action( 'admin_print_footer_scripts', 'select_all_js' );

function select_all_js(){

<script type="text/javascript">
jQuery(document).ready(function($) {
$('ul.acf-checkbox-list').prepend('<li><label class="selectit"><input type="checkbox" class="toggle-all-terms"/> Select all</label>');
$('.toggle-all-terms').on('change', function(){
$(this).closest('ul').find(':checkbox').prop('checked', this.checked );
});
});
</script>
<?php

}
