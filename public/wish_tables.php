<?php
$facebookIds = $_REQUEST['facebook_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta property="og:title" content="wish tables"/>
<meta property="og:type" content="food"/>
<meta property="og:image" content="#"/>
<meta property="og:url" content="http://apps.facebook.com/social_table/"/>
<meta property="og:site_name" content="Social Table"/>

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

<?php 
foreach ($facebookIds as $facebookId) {
?>
    <input type="hidden" name="facebook_id[]" value="<?php echo $facebookId;?>"/>
<?php 
}
?>

<script type="text/javascript" src="js/lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/wish_tables.inc.js"></script>
</body> 
</html>
