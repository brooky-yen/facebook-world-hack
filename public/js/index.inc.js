$(document).ready(function() {
    FB.init({
        appId: "131536600275003", 
        status: true, 
        cookie: true,
        oauth: true,
    });
    
});

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