<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="eventsMother"></div>
   
<script>
    
   // alert('eventCalendar/control/control_events.php?month="'+month+'"&day="'+day+'"&year="'+year+'"');
    jQuery('.eventsMother').load('eventCalendar/control/control_events.php?month='+month+'&day='+day+'&year='+year+'&dayName='+dayName);
    //jQuery.post('eventCalendar/control/control_events.php',{month:month,day:day,year:year});
    //alert(month+'/'+day+'/'+year);
    </script>