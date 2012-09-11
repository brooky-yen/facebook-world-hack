<?php
session_start();

$mysqli = new mysqli('http://socialtable.eztable.com/', 'social_table', 'social_table', 'socialtable');
    if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit;
	}

	var_dump($mysqli);exit;
	// check is this account already exist
    $query = 'SELECT * FROM `member` WHERE `account` = "' . $account . '"';
    $result = $mysqli->query($query);
	$resultArray = mysqli_fetch_assoc($result);

	// if already exist, alert and redirect to last page
	if ($resultArray) {
		$result->free();
		$mysqli->close();
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
		echo "<script>alert('This account already exist! Change other accounts'); history.back();</script>";
		exit;
	}

	// get now datetime
	$cdate = new DateTime();
	$cdate = $cdate->format('Y-m-d H:i:s');

	// insert member data
	$query = 'INSERT INTO `imigisco_kai`.`member` (';
	$query .= '`account`, `password`, `name`, `tel`, `email`, `cdate`)';
	$query .= 'VALUES ("' . $account . '","' . $_REQUEST['password'] . '","' . $_REQUEST['name'] . '","' . $_REQUEST['tel'] . '","' . $_REQUEST['email'] . '","' . $cdate . '");';

	$result = $mysqli->query($query);
	$insertId = mysqli_insert_id($mysqli);

	// get member data
	$query = 'SELECT * FROM `member` WHERE `id` = ' . $insertId;
	$result = $mysqli->query($query);
	$member = mysqli_fetch_assoc($result);

	// check exception
	if ($insertId < 1 || !$member) {
		$result->free();
		$mysqli->close();
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
		echo "<script>alert('Insert Faield!'); history.back();</script>";
		exit;
	}

	// free connection
	$result->free();
	$mysqli->close();






/*

// get restaurant id & reservation id
$restaurantId = filter_input(INPUT_POST, CC::RESTAURANT_ID, FILTER_VALIDATE_INT);
$reservationId = filter_input(INPUT_POST, 'br_id', FILTER_VALIDATE_INT);
if ($restaurantId === false || $reservationId === false) {
    echo htmlspecialchars(json_encode(false), ENT_NOQUOTES);
    exit;
}

// get reservation
$reservation = ReservationDao::getInstance()->getData(intval($reservationId));

// get title
$title = '';
if ($reservation !== false) {
    $title = $reservation[CC::SUBJECT];
    if (trim($title) == '') {
        $title = $reservation['perpose'];
    }
}

// get account
$app = EZApp::getInstance();
$account = $app->getAccount();

// create restaurant photo api
$restaurantPhotoAPI = new RestaurantPhotoAPI($account);

// get $_FILES
$FILES = $app->getFILES();
if (!isset($FILES['file'])) {
    throw new EZParameterException();
}

// get temp path
$tmpPaths = $FILES["file"]["tmp_name"];

$isUpload = false;
$photos = array();
foreach ($tmpPaths as $tmpPath) {
    // add photo
    $photoId = $restaurantPhotoAPI->add_photo($restaurantId);
    if (intval($photoId) <= 0) {
        continue;
    }

    // update photo secret
    $secret = StringUtils::randomAlphaNumericString(40);
    $data = array(
        CC::SECRET => $secret,
        CC::RESERVATION_ID => $reservationId,
        CC::TITLE => $title,
    );
    $updateRow = RestaurantPhotosDao::getInstance()->update($data, array(CC::ID => $photoId));

    // get photo
    $photo = RestaurantPhotosDao::getInstance()->getData($photoId);
    if ($photo === false) {
        continue;
    }

    // get file name
    $fileName = RestaurantPhotosDao::getInstance()->getPhotoFilename($photo);

    // get target path
    $targetPath = RestaurantPhotosDao::IMG_TARGET_PATH . $fileName;

    // move file to queue
    $isMoveFile = move_uploaded_file($tmpPath, $targetPath);
    if ($isMoveFile) {
        // change permission
        chmod($targetPath, 0666);
        
        // update photo upload status to queued
        RestaurantPhotosDao::getInstance()->update(array(
            CC::UPLOAD_STATUS => CV::QUEUED,
        ), array(
            CC::ID => $photo[CC::ID],
        ));
    
        $isUpload = true;
        $photos[] = array(
            CC::ID => $photo[CC::ID],
            'img' => $fileName,
        );
    } else {
        // update photo upload status to failed
        RestaurantPhotosDao::getInstance()->update(array(
            CC::UPLOAD_STATUS => CV::FAILED,
        ), array(
            CC::ID => $photo[CC::ID],
        ));
    }
    
}

if ($isUpload == true) {
    echo json_encode($photos);
} else {
    echo json_encode(false);
}
*/
exit;
