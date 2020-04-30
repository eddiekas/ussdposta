<?php
session_start();

if(isset($_SESSION["text"])){

	echo 'Text has been set and SESSIONS might be working great!	'.$_SESSION['text'];

}
// else{

// 	echo 'Text has NOT been set and your SESSIONS is messed up!';
// }




?>