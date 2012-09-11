$wishTables = {};

$wishTables.getWishTablesByFacebookId = function() {
    // get facebook ids from request
    var facebookIds = $('input[name="facebook_id[]"]');
    var facebook_id = [];
    facebookIds.each(function(key) {
        facebook_id.push($(this).val());
    });
    
    // set api info
    var url = "http://api.eztable.com/v2/user/get_want_to_eat_restaurants_by_facebook_id/";
    var params = {
        facebook_id: facebook_id
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
            
            // process each member's wish tables
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
                    
                    
                    // table name and link
                    var rest_link = 'http://www.eztable.com.tw/rest_info.php?id=' + table.id;
                    ul.find('li:first').find('a').attr('href', rest_link).text(table.name);
                    
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
            
            // union tables
            var union_tables = data.union_restaurants;
            $.each(union_tables, function(k, union_table) {
                var ul = $('#union_wish_tables').find('ul:first').clone();
                
                // table name
                var rest_link = 'http://www.eztable.com.tw/rest_info.php?id=' + union_table.id;
                ul.find('li:first').find('a').attr('href', rest_link).text(union_table.name);
                
                // table img
                var table_img = 'http://www.eztable.com.tw' + union_table.thumb1;
                ul.find('li:last img').attr('src', table_img).attr('alt', union_table.name);
                
                // append
                ul.show();
                $('#union_wish_tables').append(ul);
            });
            
            // intersection tables
            var intersection_tables = data.intersection_restaurants;
            $.each(intersection_tables, function(key, intersection_table) {
                var ul = $('#intersection_wish_tables').find('ul:first').clone();
                
                // table name
                var rest_link = 'http://www.eztable.com.tw/rest_info.php?id=' + intersection_table.id;
                ul.find('li:first').find('a').attr('href', rest_link).text(intersection_table.name);
                
                // table img
                var table_img = 'http://www.eztable.com.tw' + intersection_table.thumb1;
                ul.find('li:last img').attr('src', table_img).attr('alt', intersection_table.name);
                
                // append
                ul.show();
                $('#intersection_wish_tables').append(ul);
            });
        }
    });
}

$(document).ready(function() {
    $wishTables.getWishTablesByFacebookId();
});