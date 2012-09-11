$(document).ready(function() {
    
    FB.init({
        appId: "131536600275003", 
        status: true, 
        cookie: true,
        oauth: true,
    });
    
    FB.login(function(response) {
        if (response.authResponse) {
            $("#jfmfs-container").jfmfs();
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me', function(response) {
            console.log('Good to see you, ' + response.name + '.');
          });
        } else {
          console.log('User cancelled login or did not fully authorize.');
        }
      });
    
    /*
    FB.getLoginStatus(function(response) {
        if (response.session) {
          //init();
            $("#jfmfs-container").jfmfs();
        } else {
          // no user session available, someone you dont know
        }
    });
    $("#jfmfs-container").jfmfs();

    
    */
    
    
    
    
    
    
    
    
    
    
    /*
    FB.init({
        appId: "131536600275003", 
        status: true, 
        cookie: true,
        oauth: true,
    });
    $("#jfmfs-container").jfmfs();
    */
    
    
    
    
    
    
    $('#fb-login').click(function() {
        postToFeed();
    });
    
});

function loginFB() {
    FB.login(function(response) {
        if (response.session) {
            init();
        } else {
            alert('Login Failed!');
        }
    });
}


function login() {
    FB.login(function(response) {
        if (response.session) {
            init();
        } else {
            alert('Login Failed!');
        }
    });
}

function init() {
  FB.api('/me', function(response) {
      $("#username").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>");



      $("#jfmfs-container").jfmfs({ 
          max_selected: 15, 
          max_selected_message: "{0} of {1} selected",
          friend_fields: "id,name,last_name",
          pre_selected_friends: [1014025367],
          exclude_friends: [1211122344, 610526078],
          sorter: function(a, b) {
            var x = a.last_name.toLowerCase();
            var y = b.last_name.toLowerCase();
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
          }
      });
      $("#jfmfs-container").bind("jfmfs.friendload.finished", function() { 
          window.console && console.log("finished loading!"); 
      });
      $("#jfmfs-container").bind("jfmfs.selection.changed", function(e, data) { 
          window.console && console.log("changed", data);
      });                     
      
      $("#logged-out-status").hide();
      $("#show-friends").show();

  });
}              


function postToFeed() {
    var obj = {
        method: 'feed',
        //to: 217352441629605,
        link: 'http://www.facebook.com/HandsomeKAI',
        picture: 'http://qph.cf.quoracdn.net/main-thumb-4211440-200-Di1eriWgB0URQhKK1HSggeO2pJvdmbJd.jpeg',
        name: 'Facebook Dialogs',
        caption: 'Let\'s post a feed!!!',
        description: 'Using Dialogs to interact with users.'
    };

    function callback(response) {
        document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
    }

    FB.ui(obj, callback);
}