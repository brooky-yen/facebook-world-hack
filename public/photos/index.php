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
<body>
    <img src="photo/<?php echo $photo['id']; ?>.jpg" alt="" />
<div class="description">
    <?php  echo $photo['description']; ?>
</div>
</body>
</html>
