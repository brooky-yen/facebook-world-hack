<?php

require_once '../kernel/lib/facebook/facebook.php';
        

$facebook = new \Facebook(array(
    'appId'  => 131536600275003,
    'secret' => '750fbfdd13c87817c5fa9c3d0843217c',
));
        $user_id = $facebook->getUser();
        var_dump($user_id);
        $url = $facebook->getLoginUrl(array('scope'=>'email,publish_actions'));
        echo "<script> top.location=\"".$url."\"; </script>";
        exit(0);
        if($user_id > 0) {
            try {
//                $fbme = $facebook->api('/me');
            //    $ret_obj = $facebook->api('/feed', 'POST', array(
           //     	CC::LINK => 'http://share.eztable.com.tw/page/share/292846/',
           //     	'message' => '我在 EZTABLE Share Shopping 買了超棒的餐券！',
          //      ));
          /*
                $ret_obj = $facebook->api('/me/local_shareshopping:cook?recipe=http://share.eztable.com.tw/product/coupon/77/', 'POST', array(
                	CC::LINK => 'http://share.eztable.com.tw/page/share/292846/',
                	'message' => '我在 EZTABLE Share Shopping 買了超棒的餐券！',
                ));
                */
            } catch (FacebookApiException $e) {
                ;
            }
        } 
        
        
        /*
        
        $toURL = "https://graph.facebook.com/me/local_shareshopping:cook";
$post = array(
  "recipe"=>"http://localhost:10080/",
  "access_token"=>"AAAC45NVxdQABAO3ZBmS3U2anRZAs3C0ZBP6UsIFyZB3PBgtSaMdMut6WNFaeFZB8oCZAdyExtGpcnRMQqZCyOwtm9WQfe0FSuUZD",
    "method" => "post",
);
$ch = curl_init();
$options = array(
  CURLOPT_URL=>$toURL,
  CURLOPT_HEADER=>0,
  CURLOPT_VERBOSE=>0,
  CURLOPT_RETURNTRANSFER=>true,
  CURLOPT_USERAGENT=>"Mozilla/4.0 (compatible;)",
  CURLOPT_POST=>true,
  CURLOPT_POSTFIELDS=>http_build_query($post),
);
curl_setopt_array($ch, $options);
// CURLOPT_RETURNTRANSFER=true 會傳回網頁回應,
// false 時只回傳成功與否
$result = curl_exec($ch); 
curl_close($ch);
echo $result;
*/
        
        
        // kaikao
        
        
        
        
        
