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


$search = str_replace("'", "\'", strip_tags($_GET['searchField']));
//echo $search;
$res = $event->searchEvents($dbCon, $search);
//print_r($res);
$resCount = count($res);
for ($i = 0; $i <= $resCount; $i++) {
    if ($res[$i]['title'] != '') {
         include '../view/view_eventTemplate.php';
        
    }
}