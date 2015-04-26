<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Allow-Headers: Content-Type");
	$post = $HTTP_RAW_POST_DATA;
//file_put_contents('./voice.txt', $post);
	//$post = stripslashes(substr($post, 1, -1));
	$params = json_decode($post);
		
	require_once(dirname(__FILE__).'/data.php');
	
	$data = array();
	$data['status'] = 'progress';

    // Include the Twilio PHP library
    require 'Services/Twilio.php';
 
    // Twilio REST API version
    $version = "2010-04-01";
 
    require_once(dirname(__FILE__).'/credentials.php');    
 
    // A phone number you have previously validated with Twilio
    $phonenumber = $params->customer_phone;
     
    // Instantiate a new Twilio Rest Client
    $client = new Services_Twilio($sid, $token, $version);
 
    try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $phonenumber, // The number of the phone initiating the call
            $params->pizzeria_phone, // The number of the phone receiving call
            'http://obp.sous-anneau.org/step1.php?name='.urlencode($params->customer_name).'&phone='.urlencode($params->customer_phone).'&address='.urlencode($params->customer_address).'&pizza='.urlencode($params->pizza).'&nr='.urlencode($params->nr_pizzas), // The URL Twilio will request when the call is answered
	    array(
		"StatusCallback" => "http://obp.sous-anneau.org/error.php"	
	   )
        );
        echo $call->sid;
	data_save($call->sid, $data);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>
