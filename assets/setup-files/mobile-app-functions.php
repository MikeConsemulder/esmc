<?php

/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 14-Dec-16
 * Time: 11:25
 */
class OneSignal{

	public $apikey = 'ZWU4M2VjZTktMDJhYy00MjVlLTkwN2ItNDc3ZWJlN2I2NTE5';
	public $auth = 'Authorization: Basic ZWU4M2VjZTktMDJhYy00MjVlLTkwN2ItNDc3ZWJlN2I2NTE5';
	public $appid = '87a70ee8-c9df-4e22-a65b-326d5d826696';
	public $contenttype = 'application/json';
	public $url = 'https://onesignal.com/api/v1';
	public $urlparam; //assign in function
	public $message; //assign in function
	public $headings; //assign in function
}

function getDevices(){

	//I'll never use this, but i keep it here, just in case.
	/*
	$oneSignal = new OneSignal;
	$oneSignal->urlparam = '/players?app_id=';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $oneSignal->url . $oneSignal->urlparam . $oneSignal->appid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: ' . $oneSignal->contenttype,
		'Authorization: Basic ' . $oneSignal->apikey]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	curl_close($ch);

	return $response;
	*/
}

function sendMessage($post_id, $post){

	if(get_post_type($post_id) == 'activiteiten'){
		$activityDetails = getActivityNames($post_id);
		$heading = 'Er is een nieuwe activiteit toegevoegd!';
		$message = $activityDetails['name'] . " " . makeUpDate($activityDetails['datum']);
		$oneSignal = new OneSignal;
		$oneSignal->urlparam = '/notifications';
		$oneSignal->message = $message;
		$oneSignal->headings = $heading;

		//"included_segments" => 'All',
		//"include_player_ids" => ['a1259795-2e8d-4f15-bca6-410790129024']
		$params = [
			"app_id" => $oneSignal->appid,
			"include_player_ids" => ['a1259795-2e8d-4f15-bca6-410790129024'],
			"contents" => ['en' => $oneSignal->message],
			"headings" => ['en' => $oneSignal->headings]
		];

		$response = wp_remote_post($oneSignal->url . $oneSignal->urlparam, [
			'body' => $params,
			'headers' => [
				'Authorization' => 'Basic ' . $oneSignal->apikey,
			],
		]);

		return $response;
	}
}
add_action( 'publish_post', 'sendMessage', 10, 2 );
//do_action('save_post', 'sendMessage');
?>