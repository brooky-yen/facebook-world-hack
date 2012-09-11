<?php

include dirname(__FILE__) . "/../lib/notorm/NotORM.php";

$user = 'social_table';
$password = 'socialtable';
$pdo = new PDO("mysql:dbname=social_table", $user, $password);
// $db = new NotORM($pdo);
$db = new mysqli('localhost', $user, $password, 'social_table');


/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($db->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


