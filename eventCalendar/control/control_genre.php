<?php

/*
 * This will get the events for a given month/day/year
 */

function __autoload($class_name) {
    include '../modules/module_' . $class_name . '.php';
}

include_once('../../inc/dbl.login.inc.php');
$dbCon = new PDODatabase($dbAdmin, $dbName, $dbPass);
$event = new event();

$res = $event->getGenre($dbCon);
//echo $res[1]['myGenre'];
$genreCount = count($res);
for ($i = 0; $i <= $genreCount; $i++) {
    if ($res[$i]['myGenre'] != '') {
        echo $res[$i]['myGenre'] . "<br/>";
    }
}
//print_r($res);