$(document).ready(function() {
    var my_id;
    
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
                my_id = response.id;
                console.log('Good to see you, ' + response.name + '.');
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    });
    
    
    $("#show-friends").live("click", function() {
        var friendSelector = $("#jfmfs-container").data('jfmfs');
        var friendFbIds = friendSelector.getSelectedIds();
        var url = 'wish_tables.php?';
        //var param = 'facebook_id[]=1569883047';
        var param = 'facebook_id[]=' + my_id;
        
        
        $.each(friendFbIds, function(i, v) {
            param += '&facebook_id[]=' + v;
        });
        
        url += param;
        
        window.location.href = url;
    });                  
});

