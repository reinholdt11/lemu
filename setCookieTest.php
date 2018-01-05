<?php

$UserID = $_GET['partner-info']; 
if ($UserID){
setcookie("LoginUserID", $UserID, strtotime( '+90 days' ));  /* expire in 90 dasy */
}
?>