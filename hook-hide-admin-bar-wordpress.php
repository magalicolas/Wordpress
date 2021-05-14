<?php

/**
 * FR : suppression de la barre d'admin pour les non-admins
 * EN : removal of the admin bar for no administrators
 */
 
function who_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
