<?php
session_start();

/*
$app_id = "131536600275003";

$canvas_page = "http://apps.facebook.com/social_table/";

$auth_url = "https://www.facebook.com/dialog/oauth?client_id=" . $app_id .
	"&redirect_uri=" . urlencode($canvas_page) .
    '&scope=email,read_stream,publish_stream';

$signed_request = $_REQUEST["signed_request"];

list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

if (empty($data["user_id"])) {
    echo("<script> top.location.href='" . $auth_url . "'</script>");
} else {
    
    echo ("Welcome User: " . $data["user_id"]);
    $message = "Apps on Facebook.com are cool!";

}
*/ 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="js/lib/fb-friend-selector/jquery.facebook.multifriend.select.css" /> 
<script src="http://connect.facebook.net/en_US/all.js"></script> 
<title>wish tables</title>
</head>
<body>
<div id="fb-root"></div> 
<h2>just pick friends to see what tables you guys both like!</h2>

<p id="show-friends">go to sww</p>
<div id="selected-friends"></div>
<div id="jfmfs-container"></div>

   
<script type="text/javascript" src="js/lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/lib/fb-friend-selector/jquery.facebook.multifriend.select.min.js"></script>
<script type="text/javascript" src="js/index.inc.js"></script>
</body> 
</html>



