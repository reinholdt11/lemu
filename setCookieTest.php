<?php

$google_cid = $_GET['google_cid']; 
if ($egoogle_cid){
setcookie("_ga", $google_cid, strtotime( '+30 days' ));  /* expire in 7 dasy */
}
?>