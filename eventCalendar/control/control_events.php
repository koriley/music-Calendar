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
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$today = $_GET['dayName'];
//we are adding the needed leading 0
if ($day < '10') {
    $day = '0' . $day;
}
if ($month < '10') {
    $month = '0' . $month;
}
$startDate = $year . '-' . $month . '-' . $day;
$res = $event->getEvents($dbCon, $startDate);

$resCount = count($res);
for ($i = 1; $i <= $resCount; $i++) {
    if ($res[$i]['title'] != '') {
        if (($res[$i]['eventtype'] == 'once') || ($res[$i]['eventtype'] == 'recurring') && ($res[$i]['weekly_weekdays'] == $today)) {
            include '../view/view_eventTemplate.php';
        }
    }
}
//print_r($res);