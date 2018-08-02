<?php
/*
 * here we get all members and information from the database and return them in an json array
 */

/*
 * this function grabs all users from the database
 */
function get_members($random) {

	$temp_array = [];
	$args = array(
		'post_type' => 'leden'
		//'posts_per_page' => 2
	);
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()):
		while ($the_query->have_posts()) : $the_query->the_post();
			array_push($temp_array,[
				'voornaam' => get_custom_field('voornaam',FALSE),
				'achternaam' => get_custom_field('achternaam',FALSE),
				'motor' => wp_get_attachment_url(get_custom_field('motor',FALSE)),
				'motor_merk' => get_custom_field('motor_merk',FALSE),
				'motor_type' => get_custom_field('motor_type',FALSE),
				'naam_op_website' => get_custom_field('naam_op_website',FALSE),
				'bouwjaar_motor' => get_custom_field('bouwjaar_motor',FALSE)
			]);
		endwhile;
		wp_reset_postdata();
	else:
		return ['nothing found'];
	endif;
	if($random == true){
		return shuffle_assoc($temp_array);
	}else{
		return($temp_array);
	}
}

function shuffle_assoc($list) {
	if (!is_array($list)) return $list;

	$keys = array_keys($list);
	shuffle($keys);
	$random = array();
	foreach ($keys as $key) {
		$random[$key] = $list[$key];
	}
	return $random;
}
?>


