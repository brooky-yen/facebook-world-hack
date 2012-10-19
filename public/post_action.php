<?php
require_once '../kernel/lib/facebook/facebook.php';
        
$facebook = new \Facebook(array(
    'appId'  => 131536600275003,
    'secret' => '750fbfdd13c87817c5fa9c3d0843217c',
));

$user_id = $facebook->getUser();
if($user_id > 0) {
    try {
        $params = array('voucher'=>'http://socialtable.eztable.com/public/post_action.php','access_token'=>$facebook->getAccessToken());
        $ret_obj = $facebook->api('/me/social_table:get', 'post', $params);
        
        var_dump($ret_obj);

        
    } catch (FacebookApiException $e) {
        var_dump($e);
    }
} 
        



        
       

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
      xmlns:fb="https://www.facebook.com/2008/fbml"> 

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# social_table: http://ogp.me/ns/fb/social_table#">
  <meta property="fb:app_id" content="131536600275003" /> 
  <meta property="og:type"   content="social_table:voucher" /> 
  <meta property="og:url"    content="http://socialtable.eztable.com/public/index.php" /> 
  <meta property="og:title"  content="Sample Voucher" /> 
  <meta property="og:image"  content="http://www.thewordsworthhotel.co.uk/wp-content/uploads/gift-voucher.jpg" /> 
  <meta property="og:description" content="The Turducken of Cookies" /> 
  <meta property="social_table:voucher" content="http://socialtable.eztable.com/public/post_action.php"> 
   <title>OG Tutorial App</title>   

  <script type="text/javascript">
  function postCook()
  {
      FB.api(
        '/me/social_table:get',
        'post',
        { voucher: 'http://socialtable.eztable.com/public/post_action.php' },
        function(response) {
           if (!response || response.error) {
              alert(response.error.message);
           } else {
              alert('Voucher was gotton successful! Action ID: ' + response.id);
           }
        });
      
  }
  </script>
</head>
<body>
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '131536600275003', // App ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
    };

    // Load the SDK Asynchronously
    (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
  </script>

  <h3>Stuffed Cookies</h3>
  
  <fb:login-button show-faces="true" width="200" max-rows="1" scope="publish_actions"></fb:login-button>
    <br><br><br>
  
  
  <p>
    <img title="Stuffed Cookies" 
         src="http://www.thewordsworthhotel.co.uk/wp-content/uploads/gift-voucher.jpg" 
         width="300"/>
  </p>

  <br>
  <form>
    <input type="button" value="Voucher" onclick="postCook()" />
  </form>
  
  <hr />
  <form method="post" action="control/post_action_ajax.php">
    <input type="submit" value="post action"  />
  </form>

  <fb:activity actions="social_table:voucher"></fb:activity>

</body>
</html>
        
        
        
