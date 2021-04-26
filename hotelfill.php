<?php

if (! isset($_GET['term'])) {
  die('Missing request parameter');
}

session_start();

if (( ! isset($_SESSION['userid'])) && (! isset($_SESSION['name']))) {
  die('ACCESS DENIED');
}

require_once 'pdo.php';

header("Content-type: application/json; charset=utf-8");

$term = $_GET['term'];
error_log("Looking up typeahead term=".$term);

$stmt = $pdo->prepare('SELECT hotelname FROM hotels WHERE hotelname LIKE :prefix');
$stmt->execute(array(':prefix' => "%".$term."%"));


$retval = array();

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $retval[] = $row['hotelname'];
}

echo(json_encode($retval));
