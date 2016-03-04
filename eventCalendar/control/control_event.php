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
$id = $_GET['eventNum'];

//we are adding the needed leading 0


$res = $event->getSingleEvent($dbCon, $id);


print_r($res);