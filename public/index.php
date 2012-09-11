<?php
session_start();

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

    /*
    $feed_url = "https://www.facebook.com/dialog/feed?app_id=" 
        . $app_id . "&redirect_uri=" . urlencode($canvas_page)
        . "&message=" . $message;
    echo("<script> top.location.href='" . $feed_url . "'</script>");
                */
} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>wish tables</title>
</head>
<body>

<div id="user_wish_tables">
    <div id="wish_table_template" style="display: none;">
        <img src="#" alt="Kai Kao" />
        <p>Kai Kao 想吃的餐廳</p>
        <ul style="display: none;">
            <li><a href="#" target="_blank">Kai Kao餐廳</a></li>
            <li><img src="#" width="130px" height="85px" alt="Kai Kao restaurant" /></li>
        </ul>
    </div>
</div>


<div id="union_wish_tables">
    <p>你們想吃的全部餐廳</p>
    <ul style="display: none;">
        <li><a href="#" target="_blank">Kai Kao餐廳</a></li>
        <li><img src="#" width="130px" height="85px" alt="Kai Kao restaurant" /></li>
    </ul>
</div>


<div id="intersection_wish_tables">
    <p>你們都想吃的餐廳</p>
    <ul style="display: none;">
        <li><a href="#" target="_blank">Kai Kao餐廳</a></li>
        <li><img src="#" width="130px" height="85px" alt="Kai Kao restaurant" /></li>
    </ul>
</div>

<script type="text/javascript" src="js/lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/index.inc.js"></script>
</body> 
</html>



