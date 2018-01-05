<?php

$test  = true;

if($test){
	$UserID = "test-uid".intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); 
	if ($UserID){
	setcookie("LoginUserID", $UserID, strtotime( '+90 days' ));  /* expire in 90 dasy */
}
} else

$UserID = $_GET['partner-info'];
if ($UserID){
setcookie("LoginUserID", $UserID, strtotime( '+90 days' ));  /* expire in 90 dasy */
}
?>