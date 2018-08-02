<?php
/* Template Name: json-template */
header("Access-Control-Allow-Origin: *");
if(!defined('ABSPATH')){
	require_once('./wp-load.php');
}

//if(isset($_GET['method'])){
if($_GET['method'] == 'all'){
	getFutureActivities();
}
else{
	if($_GET['method'] == 'single'){
		getSingleActivity();
	}
}

function getSingleActivity(){

	$id = $_GET['id'];
	$post = get_post($id);
	$detailArray = [];
	foreach($post as $key => $value){
		$detailArray[$key] = $value;
	}
	//
	//
	$args = ['p' => $id, 'post_type' => 'activiteiten'];

	$loop = new WP_Query($args);

	$keyArray = [];
	while($loop->have_posts()) : $loop->the_post();
		global $post;
		global $wpdb;
		$detailArray['beginDate'] = makeUpDate(get_custom_field('datum_activiteit'));
		$detailArray['tijd_activiteit'] = get_custom_field('tijd_activiteit');
		$detailArray['locatie'] = get_custom_field('locatie');
		$detailArray['plaats'] = get_custom_field('plaats');
		$detailArray['adres'] = get_custom_field('adres');
		$detailArray['organisator'] = get_custom_field('organisator');
		$detailArray['type_inschrijfformulier'] = get_custom_field('type_inschrijfformulier');
		$detailArray['uiterlijke_inschrijfdatum'] = get_custom_field('uiterlijke_inschrijfdatum');
		$detailArray['organisator_mail'] = get_custom_field('organisator_mail');
		$results = $wpdb->get_results("SELECT * FROM inschrijvingen WHERE activiteitId = " . $id, OBJECT);
		$results = json_decode(json_encode($results), true);
	endwhile;
	if(isset($results[0])){
		foreach($results as $key1 => $subArray){
			foreach($subArray as $key => $value){
				if($value != ""){
					if(!in_array($value, $keyArray)){
						array_push($keyArray, $key);
					}
				}
			}
		}
	}
	$masterArray = [];
	$masterArray['result']['details'] = $detailArray;
	foreach($results as $key => $resultArray){
		$masterArray['result']['inschrijvingen'][$key] = [];
		foreach($resultArray as $masterKey => $value){
			if(in_array($masterKey, $keyArray)){
				$masterArray['result']['inschrijvingen'][$key][$masterKey] = $value;
			}
		}
	}
	echo json_encode($masterArray);
}

function getFutureActivities(){

	//
	$masterArray = [];

	$args = [
		'post_type' => 'activiteiten',
		'orderby' => 'meta_value_num',
		'meta_key' => 'datum_activiteit',
		'post_status' => 'publish',
		'order' => 'ASC',
		'meta_query' => [
			[
				'value' => date('Ymd', strtotime("today")),
				'compare' => '>=',
				'type' => 'DATE'
			]
		]
	];
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()) : $the_query->the_post();
			$tempArray = [
				"title" => get_the_title(),
				"date" => makeUpDate(get_custom_field('datum_activiteit', false)),
				"organisator" => get_custom_field('organisator', false),
				"uaid" => get_the_ID()
			];
			array_push($masterArray, $tempArray);
		endwhile;
		wp_reset_postdata();
	else:
		//error
	endif;
	echo json_encode($masterArray);

}

?>