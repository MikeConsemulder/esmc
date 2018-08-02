<?php
/*
 * here we make the custom post types that don't come with standard Wordpress.
 * To add one, just add a array to the array, yes this is true :) 
 * with the 3 parameters: name, singular_name, machine_name
 * 
 * when you've added them, you must go to http://esmc.nl/wp-admin/users.php?page=roles
 * Here you can change the permissions by roles, so you can add the permissions to the 
 * administrator role or organisator role, etc.
 */
$postTypes = array(
    [
        'name' => 'Videos',
        'singular_name' => 'Video',
        'machine_name' => 'videos',
    ],
    [
        'name' => 'Inschrijf forms',
        'singular_name' => 'Inschrijf_form',
        'machine_name' => 'inschrijf_forms',
    ],
    [
        'name' => 'Besturen',
        'singular_name' => 'Bestuur',
        'machine_name' => 'besturen',
    ],
    [
        'name' => 'Activiteiten',
        'singular_name' => 'Activiteit',
        'machine_name' => 'activiteiten',
    ],
    [
        'name' => 'Contactgegevens',
        'singular_name' => 'Contactgegeven',
        'machine_name' => 'contactgegevens',
    ],
	[
		'name' => 'Leden',
		'singular_name' => 'Lid',
		'machine_name'=> 'leden'
	]
);

/*
 * This function cycles through the array and registers the custom post type
 * add the end he adds the action so that Wordpress will accept the post type
 */
function create_post_types($post_types) {
    
    foreach ($post_types as $postType) {
        
        register_post_type($postType['machine_name'], array(
            'labels' => array(
                'name' => __($postType['name']),
                'singular_name' => __($postType['singular_name'])
            ),
            'public' => true,
            'capability_type' => $postType['singular_name'],
            'capabilities' => array(
                'publish_posts' => 'publish_' . $postType['machine_name'],
                'edit_posts' => 'edit_' . $postType['machine_name'],
                'edit_others_posts' => 'edit_others_' . $postType['machine_name'],
                'delete_posts' => 'delete_' . $postType['machine_name'],
                'delete_others_posts' => 'delete_others_' . $postType['machine_name'],
                'read_private_posts' => 'read_private_' . $postType['machine_name'],
                'edit_post' => 'edit_' . $postType['machine_name'],
                'delete_post' => 'delete_' . $postType['machine_name'],
                'read_post' => 'read_' . $postType['machine_name'],
            ),
            'has_archive' => true,
            'rewrite' => array('slug' => $postType['machine_name'])
                )
        );
        add_action('init', 'create_posttype_' . $postType['machine_name']);
    }
}

/*
 * execute the function with the post_type array
 */
create_post_types($postTypes);
?>