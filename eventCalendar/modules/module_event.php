<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class event{
    
    function getEvents($dbCon, $startDate){
        //startDate should be in the format yyyy-mm-dd so month and year need a leading 0.
        //the sql is doing a search betwen two values here, the start date and the end date, should 
        //lead to less work and faster processing.
        $sql = "SELECT  * FROM events WHERE isapproved='t' AND startdate <='$startDate' AND '$startDate'<=enddate ORDER BY starttime";
        $res = $dbCon->select($sql);
        
        //var_dump($res);
        //echo $sql;
         return ($res);
       
    }
    
    function searchEvents($dbCon, $search){
        $sql = "SELECT * FROM events WHERE title LIKE'%$search%' OR city LIKE '%$search%' OR location LIKE '%$search%' AND isapproved = 't'";
        //echo $sql;
        $res = $dbCon->select($sql);
        //echo $sql;
        return($res);
    }
    
    function getSingleEvent($dbCon, $id){
        $sql = "SELECT * FROM events WHERE id=$id";
        $res = $dbCon->select($sql);
        return $res;
    }
}