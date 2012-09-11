<?php
session_start();

// set photo path
$PHOTO_PATH = '../photo/';

// get $_FILES
$FILES = $_FILES;

// check files
if (!isset($FILES['uploadedfile'])) {
    echo "no files!";
    exit;
}
if ($FILES['uploadedfile']['error'] > 0) {
    echo 'something wrong...';
    exit;
}

// connect mysqli
//$mysqli = new mysqli('localhost', 'root', 'eztable323', 'social_table');
$mysqli = new mysqli('localhost', 'social_table', 'socialtable', 'social_table');
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit;
}

// get temp path
$tmpPath = $FILES["uploadedfile"]["tmp_name"];

// add photo row
$cdate = new DateTime();
$cdate = $cdate->format('Y-m-d H:i:s');

// insert
$query = 'INSERT INTO `social_table`.`photos` (';
$query .= '`access_token`, `description`, `restaurant_id`, `cdate`)';
$query .= 'VALUES ("' . $_REQUEST['access_token'] . '","' . $_REQUEST['description'] . '","' . $_REQUEST['restaurant_id'] . '","' . $cdate . '");';

$result = $mysqli->query($query);
$insertId = mysqli_insert_id($mysqli);

// get file name
$fileName = $insertId . '.jpg';

// get target path
$targetPath = $PHOTO_PATH . $fileName;

// upload photo
$isUpload = move_uploaded_file($tmpPath, $targetPath);

// update photo status by upload status
if ($isUpload) {
    // change permission
    chmod($targetPath, 0666);
    $status = 'ok';
} else {
    $status = 'failed';
}

// generate update query
$updateQuery = 'UPDATE  `social_table`.`photos` SET  `upload_status` =  "' . $status . '" WHERE  `photos`.`id` =' . $insertId;

// update
$result = $mysqli->query($updateQuery);

// free
$mysqli->close();

echo json_encode(array('status' => $status, 'photo_id' => $insertId));
exit;
