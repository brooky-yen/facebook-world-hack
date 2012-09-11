<?php

require_once dirname(__FILE__) . "/../../include/db.php";

$id = intval($_GET['id']);

$query = 'select * from `photos` where `id`= ' . $id;
$result = $db->query($query);
if (! $result) {
    die('not valid id');
}
$photo = $result->fetch_assoc();

?>


<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Photo <?php echo $photo[$i]; ?></title>
    <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"  />
  <meta property="fb:app_id" content="131536600275003" /> 
  <meta property="og:type"   content="social_table:dish" /> 
  <meta property="og:url"    content="http://socialtable.eztable.com/public/photos/index.php?id=<?php echo $photo[$i]; ?>" /> 
  <meta property="og:title"  content="Dish Photo <?php echo $photo[$i]; ?>" /> 
  <meta property="og:image"  content="http://socialtable.eztable.com/public/photo/<?php echo $photo['id']; ?>.jpg" /> 

</head>
<body>

    <img src="../photo/<?php echo $photo['id']; ?>.jpg" width="300" height="200" alt="" />
    <div class="description">
        <?php  echo $photo['description']; ?>
    <div class="want_to_eat">
        <iframe src="http://widget-og.eztable.com.tw/want_to_eat/eat.php?restaurant_id=<?php echo $photo['restaurant_id']; ?>&photo_id=<?php echo $photo['id']; ?>" width="150" height="40"></iframe>
    </div>
    </div>
      <button class="btn btn-large btn-primary" type="button">Login</button>

</body>
<script type="text/javascript" charset="utf-8">
     
</script>
</html>
