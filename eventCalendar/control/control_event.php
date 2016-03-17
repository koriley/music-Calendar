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


//print_r($res);

echo '<div class="singleEvent">
    <h1>' . $res[0]['title'] . '</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 location">
                ' . $res[0]['location'] . '
                <div class="address">
                    ' . $res[0]['address'] . '
                </div>';
if ($res[0]['city'] != '') {
    echo '<div class="cityState">' . $res[0]['city'] . ',' . $res[0]['state'] . '</div>';
}
if ($res[0]['phone'] != '') {
    echo '<div class="phone">' . $res[0]['phone'] . '</div>';
}
if ($res[0]['url'] != '') {
    echo '<div class="url"><a href="' . $res[0]['url'] . '">' . $res[0]['url'] . '</a></div>';
}


echo' </div>
            <div class="col-md-4 time">' . $res[0]['starttime'] . ' - ' . $res[0]['endtime'] . '</div>
                  
        </div>
        <div class="row-fluid">
             <div class="desc">' . $res[0]['description'] . '</div>';
if ($res[0]['image'] != '') {
    echo '<div class="photo"><img src="http://417mag.com' . $res[0]['image'] . '" /></div>';
}
echo '</div>
    </div>

</div>';
?>

