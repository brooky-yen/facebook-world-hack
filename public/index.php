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
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# social_table: http://ogp.me/ns/fb/social_table#">
  <meta property="fb:app_id" content="131536600275003" /> 
  <meta property="og:type"   content="social_table:voucher" /> 
  <meta property="og:url"    content="http://socialtable.eztable.com/public/index.php" /> 
  <meta property="og:title"  content="Sample Voucher" /> 
  <meta property="og:image"  content="http://www.thewordsworthhotel.co.uk/wp-content/uploads/gift-voucher.jpg" /> 
  <meta property="og:description" content="TEST" /> 

<link rel="stylesheet" href="js/lib/fb-friend-selector/jquery.facebook.multifriend.select.css" /> 
<script src="http://connect.facebook.net/en_US/all.js"></script> 
<title>find table to social</title>
</head>
<body>
<div id="fb-root"></div> 
<h2>just pick friends to see what tables you guys both like!</h2>
<hr />

<input type="button" value="let's check out!" id="show-friends"></input>
<div id="selected-friends"></div>
<div id="jfmfs-container"></div>

   
<script type="text/javascript" src="js/lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/lib/fb-friend-selector/jquery.facebook.multifriend.select.min.js"></script>
<script type="text/javascript" src="js/index.inc.js"></script>
</body> 
</html>



