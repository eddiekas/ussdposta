<?php
error_reporting(0);//turns off errir
date_default_timezone_set("Africa/Nairobi");

$db = new mysqli('localhost', 'root', 'toor', 'posta'); //connect to database named posta...
$error = "END Sorry, Connection Error kindly try again later!";

if($db-> connect_error){

	//echo ('END Service Unavailable. Try again Later.');
	//echo '<pre>';
	switch($db->connect_errno){

		case('1049'):
		file_put_contents('Error.log','['.date('Y-m-d H:i:s').']'.' '.$db->connect_error.PHP_EOL,FILE_APPEND);
		die($error);
		break;

		case('1045'):
		file_put_contents('Error.log','['.date('Y-m-d H:i:s').']'.' '.$db->connect_error.PHP_EOL,FILE_APPEND);
		die($error);
		break;

		case('2002'):
		file_put_contents('Error.log','['.date('Y-m-d H:i:s').']'.' '.$db->connect_error.PHP_EOL,FILE_APPEND);
		die($error);
		break;
	}


	
	//exit;

}

?>