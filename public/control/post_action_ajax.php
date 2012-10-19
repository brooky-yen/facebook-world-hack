<?php
require_once '../../kernel/lib/facebook/facebook.php';
        
$facebook = new \Facebook(array(
    'appId'  => 131536600275003,
    'secret' => '750fbfdd13c87817c5fa9c3d0843217c',
));



$user_id = $facebook->getUser();
if($user_id > 0) {
    try {
       // $ret_obj = $facebook->api('/feed', 'POST', array(
    //    	'link' => 'http://share.eztable.com.tw/page/share/292846/',
    //    	'message' => '我在 EZTABLE Share Shopping 買了超棒的餐券！',
    //    ));
        
        
        $params = array('voucher'=>'http://socialtable.eztable.com/public/post_action.php','access_token'=>$facebook->getAccessToken());
        $ret_obj = $facebook->api('/me/social_table:get', 'post', $params);
        
        var_dump($ret_obj);
        
    } catch (FacebookApiException $e) {
        var_dump($e);
    }
} 
    

?>

        
        
