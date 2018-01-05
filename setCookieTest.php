<?php

$UserID = $_GET['partner-info']; 
if ($UserID){
setcookie("_ga", $UserID, strtotime( '+90 days' ));  /* expire in 90 dasy */
}
?>