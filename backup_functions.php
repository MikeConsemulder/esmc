<?php
//load CSS and Javascript scripts
function my_scripts_method()
{
    // wp_deregister_script('jquery');

    // wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
    // wp_enqueue_script('jquery');
}

//add_action('wp_enqueue_scripts', 'my_scripts_method');

wp_enqueue_style(
    // 'my-bootstrap-extension',
    // get_template_directory_uri() . '/assets/css/main.css',
    // array('bootstrap-main'),
    // null
);

//register the navigation menu's
register_nav_menus(array(
    // 'primary' => __('Primary Menu', 'esmc'),
));

//organisator role toevoegen voor evenementen organisatie
// $result = add_role(
//     'organisator', __('Organisator'), array(
//         'read' => true, // true allows this capability
//         'edit_posts' => false,
//         'delete_posts' => false, // Use false to explicitly deny
//     )
// );

function get_custom_field($key, $echo = false)
{
    // global $post;
    // $custom_field = get_post_meta($post->ID, $key, true);
    // if ($echo == false) {
    //     return $custom_field;
    // }
}

function makeUpDate($retrieved)
{
    // $date = DateTime::createFromFormat('Ymd', $retrieved);
    // return $date->format('d-m-Y');
}

function getActivityDetails()
{
    // $id = $_POST['id'];
    // $terms = get_terms('activiteiten');
    // $loop = new WP_Query(array('post_type' => 'activiteiten', 'p' => $id));
    // while ($loop->have_posts()): $loop->the_post();
    //     $title = get_the_title();
    //     $content = get_the_content();
    //     $permalink = get_permalink();
    //     $datum = makeUpDate(get_custom_field('datum_activiteit', false));
    //     $tijd = get_custom_field('tijd_activiteit', false);
    //     $locatie = get_custom_field('locatie', false);
    //     $plaats = get_custom_field('plaats', false);
    //     $adres = get_custom_field('adres', false);
    //     $organisator = get_custom_field('organisator', false);
    //     $formId = get_custom_field('type_inschrijfformulier', false);
    //     $uiterlijkeInschrijfDatum = get_custom_field('uiterlijke_inschrijfdatum', false);
    // endwhile;
    // wp_reset_postdata();
    // wp_send_json(array(
    //     'title' => $title,
    //     "text" => preg_replace("/&#?[a-z0-9]{2,8};/i", "", strip_tags($content)),
    //     "date" => $datum,
    //     "time" => $tijd,
    //     "locatie" => $locatie,
    //     "plaats" => $plaats,
    //     "adres" => $adres,
    //     "organisator" => $organisator,
    //     "form_id" => $formId,
    //     "permalink" => $permalink,
    //     "uiterlijke_inschrijfdatum" => $uiterlijkeInschrijfDatum,
    // ));
}

function makeSubmitForm()
{
    // $formId = $_POST['id'];
    // wp_send_json(generateSubmitForms(getPostTypeArray($formId)));
    //wp_send_json(getPostTypeArray($formId));
}

function generateSubmitForms($formArray)
{
    // $inputTypeArray = array();
    // foreach ($formArray as $key => $value) {
    //     if ($value['type'] == "text") {
    //         $temp = array(
    //             "instructions" => $value['instructions'],
    //             "inputType" => "text",
    //             "inputName" => $value['label'],
    //         );
    //         array_push($inputTypeArray, $temp);
    //     } else if ($value['type'] == "select") {
    //         $temp = array(
    //             "instructions" => $value['instructions'],
    //             "inputType" => "select",
    //             "inputName" => $value['label'],
    //             "inputValues" => $value['choices'],
    //         );
    //         array_push($inputTypeArray, $temp);
    //     } else if ($value['type'] == "checkbox") {
    //         $temp = array(
    //             "instructions" => $value['instructions'],
    //             "inputType" => "checkbox",
    //             "inputName" => $value['label'],
    //             "inputValues" => $value['choices'],
    //         );
    //         array_push($inputTypeArray, $temp);
    //     }
    // }
    // return $inputTypeArray;
}

function getPostTypeArray($formId)
{
//     $criteriumArray = array();
    //     $allFields = get_post_custom($formId);
    // //bepalen wat er wel in de array komt
    //     foreach ($allFields as $key => $value) {
    //         if ($key != "_edit_lock" && $key != "_edit_last") {
    //             if ($key[0] == "_") {
    //                 if ($key[1] == "@") {
    //                     $field_key = $value[0];
    //                     $field = get_field_object($field_key, $formId);
    //                     if (strtolower($field['value']) == "ja") {
    //                         $criterium = substr($field['name'], strpos($field['name'], "_") + 1);
    //                         if (!in_array($criterium, $criteriumArray)) {
    //                             array_push($criteriumArray, $criterium);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     $keyArray = array();
    //     $checkArray = array();
    //     foreach ($allFields as $key => $value) {
    //         if ($key != "_edit_lock" && $key != "_edit_last") {
    //             if ($key[0] == "_") {
    //                 if ($key[1] != "@") {
    //                     $field_key = $value[0];
    //                     $field = get_field_object($field_key, $formId);
    //                     if (in_array(substr($field['name'], strpos($field['name'], "@") + 1), $criteriumArray)) {
    //                         if (!in_array($field['key'], $checkArray)) {
    //                             array_push($checkArray, $field['key']);
    //                             array_push($keyArray, $field);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return $keyArray;
}

function addToDatabase()
{
//     $databaseFields = getDatabaseFields();
    //     $dataArray = $_POST['dataArray'];
    //     $niceArray = array();
    //     foreach ($dataArray as $key => $singleArray) {
    //         if (substr($singleArray['name'], -1) == "]") {
    //             $keyValue = str_replace(" ", "_", strtolower(substr($singleArray['name'], 0, -1)));
    //             if (!array_key_exists($keyValue, $niceArray)) {
    //                 $niceArray[$keyValue] = $singleArray['value'];
    //             } else {
    //                 $niceArray[$keyValue] .= " & " . $singleArray['value'];
    //             }
    //         } else {
    //             $keyValue = str_replace(" ", "_", strtolower($singleArray['name']));
    // //check if exist in database
    //             if (!in_array($keyValue, $databaseFields)) {
    //                 global $wpdb;
    //                 $wpdb->query("ALTER TABLE inschrijvingen ADD " . $keyValue . " varchar(255)");
    //             }
    //             $niceArray[$keyValue] = $singleArray['value'];
    //         }
    //     }
    //     $niceArray['activiteitId'] = $_POST['activiteitId'];
    //     $niceArray['inschrijf_datum'] = date("d-m-Y H:i:s");
    //     global $wpdb;
    //     $wpdb->insert('inschrijvingen', $niceArray);
    //     return (wp_send_json(sendMailForActivity($niceArray)));
}

//Deze functie stuurt emails naar de deelnemer, organisatoren en bestuur
//Deze functie is genesteld in functions.php en kan niet opgeroepen worden via een ajax call
//
//methode = function php
//vars = array met alle details van een inschrijving
//return = "1" om aan te geven dat het script klaar is
function sendMailForActivity($detailArray)
{
//     $id = $detailArray['activiteitId'];
    //     $post = get_post($id);
    //     $title = $post->post_title;
    //     $args = array('p' => $id, 'post_type' => 'activiteiten');
    //     $loop = new WP_Query($args);
    //     while ($loop->have_posts()): $loop->the_post();
    //         global $post;
    //         $organisatoren = get_custom_field("organisator_mail", false);
    //         $organisatorenArray = explode(",", $organisatoren);
    //         foreach ($organisatorenArray as $key => $organisatorMail) {
    //             $datum = strftime('%d-%m-%y %H:%M', $tijd);
    //             $subject = "Aanmelding activiteit - " . $title;
    //             $message = "Er is een nieuwe aanmelding binnengekomen voor " . $title . "
    //         " . print_r($detailArray, true);

//             wp_mail($organisatorMail, $subject, $message);
    //         }
    //     endwhile;
    //     wp_mail("bestuur@esmc.nl", $subject, $message);
    //     wp_mail("webmaster@esmc.nl", $subject, $message);
    //     $subject = "Aanmelding activiteit";
    //     $message = "Bedankt voor je aanmelding.

// De organisator(en) zullen spoedig contact met je opnemen";
    //     wp_mail($detailArray['email'], $subject, $message);
    //     return ("1");
}

//functie om alle deelnemers van een activiteit op te vragen
//
//methode = ajax
//vars = $_POST['id']    ( van de activiteit )
//return = array van deelnemers met verdere info
function getParticipants()
{
    // $allDetails = $_POST['allDetails'];
    // $id = $_POST['activiteitId'];
    // $args = array('p' => $id, 'post_type' => 'activiteiten');
    // $loop = new WP_Query($args);
    // $keyArray = array();
    // while ($loop->have_posts()): $loop->the_post();
    //     global $post;
    //     global $wpdb;
    //     if ($allDetails == 'false') {
    //         $select = "voornaam, achternaam, introducee_van, motor_type_merk, tent_of_hut, grote_tent, brander, overnachtingen, bierpot, tijdstip_vertrek, opmerkingen";
    //     } else if ($allDetails == 'true') {
    //     $select = ' * ';
    // }
    // $results = $wpdb->get_results("SELECT $select FROM inschrijvingen WHERE activiteitId = " . $id, OBJECT);
    // $results = json_decode(json_encode($results), true);
    // endwhile;
    // if (isset($results[0])) {
    //     foreach ($results as $key1 => $subArray) {
    //         foreach ($subArray as $key => $value) {
    //             if ($value != "") {
    //                 if (!in_array($value, $keyArray)) {
    //                     array_push($keyArray, $key);
    //                 }
    //             }
    //         }
    //     }
    // }
    // $masterArray = array();
    // foreach ($results as $key => $resultArray) {
    //     $masterArray[$key] = array();
    //     foreach ($resultArray as $masterKey => $value) {
    //         if (in_array($masterKey, $keyArray)) {
    //             $masterArray[$key][$masterKey] = $value;
    //         }
    //     }
    // }
    // wp_send_json($masterArray);
}

//functie om te checken of alle velden die worden ingevoerd wel bestaan in de database
//hierdoor kun je je eigen inschrijfformulieren maken
function getDatabaseFields()
{
    // $returnArray = array();
    // global $wpdb;
    // $results = $wpdb->get_results("SHOW COLUMNS FROM inschrijvingen", OBJECT);
    // $results = json_decode(json_encode($results), true);
    // foreach ($results as $key => $subArray) {
    //     array_push($returnArray, $subArray['Field']);
    // }
    // return ($returnArray);
}

function getActivityNames($id)
{
    // $my_query = new WP_Query('post_type=activiteiten&p=' . $id);
    // while ($my_query->have_posts()): $my_query->the_post();
    //     $returnArray = array();
    //     $returnArray['name'] = get_the_title();
    //     $returnArray['datum'] = get_custom_field('datum_activiteit', false);
    //     $returnArray['organisator'] = get_custom_field('organisator', false);
    //     return $returnArray;
    // endwhile;
}

function wpb_comment_reply_text($link)
{
    // $link = str_replace('Reply', 'reply', $link);
    // return $link;
}

//add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
    // if (isset($fields['url'])) {
    //     unset($fields['url']);
    // }

    // return $fields;
}

// include 'assets/setup-files/php-to-javascript-vars.php';
// include 'assets/setup-files/custom-post-types.php';
// include 'assets/setup-files/assign-includes.php';
// include 'assets/setup-files/mobile-app-functions.php';
// include 'assets/setup-files/member_lookup.php';
// include 'assets/setup-files/flickr_api.php';

// add_editor_style();
// add_filter('comment_reply_link', 'wpb_comment_reply_text');
// // Hooking up our function to theme setup
// add_action('init', 'getActivityNames');
// add_action('wp_ajax_getPhotos', 'getPhotos'); // If called from admin panel
// add_action('wp_ajax_nopriv_getPhotos', 'getPhotos'); // If called from front end
// add_action('wp_ajax_sendMail', 'sendMail'); // If called from admin panel
// add_action('wp_ajax_nopriv_sendMail', 'sendMail'); // If called from front end
// add_action('wp_ajax_getActivityDetails', 'getActivityDetails'); // If called from admin panel
// add_action('wp_ajax_nopriv_getActivityDetails', 'getActivityDetails'); // If called from front end
// add_action('wp_ajax_makeSubmitForm', 'makeSubmitForm'); // If called from admin panel
// add_action('wp_ajax_nopriv_makeSubmitForm', 'makeSubmitForm'); // If called from front end
// add_action('wp_ajax_addToDatabase', 'addToDatabase'); // If called from admin panel
// add_action('wp_ajax_nopriv_addToDatabase', 'addToDatabase'); // If called from front end
// add_action('wp_ajax_getParticipants', 'getParticipants'); // If called from admin panel
// add_action('wp_ajax_nopriv_getParticipants', 'getParticipants'); // If called from front end
// add_post_type_support('activiteiten', 'comments');
