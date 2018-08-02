<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 28-Nov-16
 * Time: 15:55
 */

// Register the script
wp_register_script('register_vars');

// Localize the script with new data
$var_array = array(
	'ajax_url' => __( admin_url('admin-ajax.php'), 'plugin-domain' ),
	'root' => get_stylesheet_directory_uri()
);
wp_localize_script( 'register_vars', 'javascript_vars', $var_array );

// Enqueued script with localized data.
wp_enqueue_script( 'register_vars' );

?>