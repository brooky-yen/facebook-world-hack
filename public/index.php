<?php
session_start();

$app_id = "131536600275003";

$canvas_page = "http://apps.facebook.com/131536600275003/";

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

    /*
    $feed_url = "https://www.facebook.com/dialog/feed?app_id=" 
        . $app_id . "&redirect_uri=" . urlencode($canvas_page)
        . "&message=" . $message;
    echo("<script> top.location.href='" . $feed_url . "'</script>");
                */
} 


