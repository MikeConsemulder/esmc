<?php
/* Template Name: cvs-template */
function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$name = clean($_GET['title']);

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=$name-".date('d-m-Y').".csv");
header("Pragma: no-cache");
header("Expires: 0");
if ( !defined('ABSPATH') ) {
	require_once('./wp-load.php');
}

	$args = ['p' => $_GET['id'], 'post_type' => 'activiteiten'];

	$loop = new WP_Query($args);

	$keyArray = [];
	while($loop->have_posts()) : $loop->the_post();
		global $post;
		global $wpdb;
		$results = $wpdb->get_results("SELECT * FROM inschrijvingen WHERE activiteitId = " . $_GET['id'], OBJECT);
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
	foreach($results as $key => $resultArray){
		$masterArray[$key] = [];
		foreach($resultArray as $masterKey => $value){
			if(in_array($masterKey, $keyArray)){
				$masterArray[$key][$masterKey] = $value;
			}
		}
	}

	arrayToCsv($masterArray, ",");

	function arrayToCsv($bigArray, $delimiter){

		foreach(array_keys($bigArray[0]) as $number => $keyValue){
			$keyValue = str_replace(',', '-', $keyValue);
			$keyValue = str_replace(';', ':', $keyValue);
			echo $keyValue . ",";
		}
		echo "\n";

		foreach($bigArray as $field){
			foreach($field as $key => $value){
				$value = str_replace(',', '-', $value);
				$value = str_replace(';', ':', $value);
				echo $value . $delimiter;
			}
			echo "\n";
		}
	}
?>