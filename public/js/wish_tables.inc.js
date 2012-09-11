$wishTables = {};

$wishTables.getWishTablesByFacebookId = function() {
    
    var facebookIds = $('input[name="facebook_id"]');
    facebookIds.each(function(a, b) {
        alert(b.val());
    });
    
    // set api info
    var url = "http://api.eztable.com/v2/user/get_want_to_eat_restaurants_by_facebook_id/";
    var params = {
        facebook_id: ['1569883047', '100000455848753']
    };
    
    // call api to get data
    $.ajax({
        url: url + '?jsoncallback=?',
        dataType: 'json',
        data: params,
        type: "POST",
        success: function(returnValue) {
            if (returnValue.status != 'OK') {
                alert('get wish tables failed!');
                return false;
            }
            
            var data = returnValue.data;
            var members = data.members;
            $.each(members, function(index, member) {
                var template = $('#wish_table_template').clone();
                
                // rm unnecessary attribute
                template.removeAttr('id');
                
                // member name
                template.find('p:first').text(member.real_name);
                
                // member img
                var member_img = 'http://graph.facebook.com/' + member.facebook_id + '/picture?type=large';
                template.find('img:first').attr('src', member_img).attr('alt', member.real_name);
                
                // process wish tables...
                var tables = member.restaurants;
                $.each(tables, function(i, table) {
                    var ul = template.find('ul:first').clone();
                    // table name
                    ul.find('li:first').text(table.name);
                    
                    // table img
                    var table_img = 'http://www.eztable.com.tw' + table.thumb1;
                    ul.find('li:last img').attr('src', table_img).attr('alt', table.name);
                    
                    // append
                    ul.show();
                    template.append(ul);
                });
                
                template.show();
                $('#user_wish_tables').append(template);
            });
        }
    });
}

$(document).ready(function() {
    $wishTables.getWishTablesByFacebookId();
});