<?php
/*
 * here we get a list of all albums and photos's of the photos from ESMC
 */

/*
API
KEY: 0dcb5914f3ad6cd86f9ec403d66f7cb9
SECRET: 84c881c30bea7711
USER_ID: 137988253@N04
*/

$api_key = '0dcb5914f3ad6cd86f9ec403d66f7cb9';
$secret = '84c881c30bea7711';
$user_id = '137988253@N04';

function get_all_photos(){

	$page = 1;
	$per_page = 500;
	$format = 'json';
	$method = 'flickr.people.getPublicPhotos';
	$url = "https://api.flickr.com/services/rest/?method=$method&api_key=" . $GLOBALS['api_key'] . "&user_id=" . $GLOBALS['user_id'] . "&extras=url_l&per_page=$per_page&page=$page&format=$format&nojsoncallback=1";

	return get_json($url);
}

/* AJAX function */
function getPhotos(){

	$album_id = $_POST['album_id'];

	$temp_array = [];
	$page = 1;
	$per_page = 500;
	$format = 'json';
	$method = 'flickr.photosets.getPhotos';
	$url = "https://api.flickr.com/services/rest/?method=$method&api_key=" . $GLOBALS['api_key'] . "&photoset_id=$album_id&user_id=" . $GLOBALS['user_id'] . "&extras=url_m%2Curl_l%2Curl_s&per_page=$per_page&page=$page&format=$format&nojsoncallback=1";

	$data_array = get_json($url);

	foreach($data_array['photoset']['photo'] as $key => $photo_info){
		if(isset($photo_info['url_l'])){
			array_push($temp_array, $photo_info['url_l']);
		}else if(isset($photo_info['url_m'])){
			array_push($temp_array, $photo_info['url_m']);
		}else{
			array_push($temp_array, $photo_info['url_s']);
		}
	}

	wp_send_json($temp_array);
}

function get_album_list(){

	$temp_array = [];
	$page = 1;
	$per_page = 100;
	$format = 'json';
	$method = 'flickr.photosets.getList';
	$url = "https://api.flickr.com/services/rest/?method=$method&api_key=" . $GLOBALS['api_key'] . "&user_id=" . $GLOBALS['user_id'] . "&page=$page&per_page=$per_page&format=$format&nojsoncallback=1&primary_photo_extras=url_m";

	$data_array = get_json($url);

	foreach($data_array['photosets']['photoset'] as $key => $photoset_info){
		array_push($temp_array, ['id' => $photoset_info['id'], 'title' => $photoset_info['title']['_content'], 'description' => $photoset_info['description']['_content'], 'album_cover' => $photoset_info['primary_photo_extras']['url_m']]);
	}

	return ($temp_array);
}

function get_json($json_url){

	$json = file_get_contents($json_url);
	$obj = json_decode($json);
	$obj = json_decode(json_encode($obj), true);

	return $obj;
}

?>


