<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="calendar">
    <button id="prevMonth" style="display:inline-block;"><</button>
    <div id="monthName" style="display:inline-block;"></div>
    <button id="nextMonth" style="display:inline-block;">></button>
    <button id="today" style="display:inline-block;">Today</button>
    <div class="currentMonth">
        <div class="dayHeading">
            <table class="table calTable" style="width:100%">
                <tr class="dayName">
                    <td>Sun</td>
                    <td>Mon</td>
                    <td>Tues</td>
                    <td>Wed</td>
                    <td>Thurs</td>
                    <td>Fri</td>
                    <td>Sat</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
   
    


//lets start with finding out what today is
    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth();
    var year = d.getFullYear();
    var dayToName = d.getDay()+1;//when we draw the cal, we will use this var to set todays day name.
    drawMonth(month, year); //draws this month
    //need to get the week day name for the event list
   
var weekday=new Array(7);
weekday[2]="Monday";
weekday[3]="Tuesday";
weekday[4]="Wednesday";
weekday[5]="Thursday";
weekday[6]="Friday";
weekday[7]="Saturday";
weekday[1]="Sunday";
var dayName = weekday[dayToName];
    
    //fetches todays events
    //jQuery('.leftSide').load('eventCalendar/view/view_events.php');
 //time to handle month changes
 jQuery('#prevMonth').click(function(){
     month=month-1;
     day=1;
     jQuery('.eventsMother').hide();
     if(month === d.getMonth()){
         day=d.getDate();
     }
     if(month<0){
         month=11;
         year=year-1;
         
         
     }
     drawMonth(month, year);
      //fetches todays events
     jQuery('.leftSide').load('eventCalendar/view/view_events.php', function(){
        jQuery('.eventsMother').show();
    });
 });
 jQuery('#nextMonth').click(function(){
     month=month+1;
     day=1;
     jQuery('.eventsMother').hide();
     if(month === d.getMonth()){
         day=d.getDate();
     }
     if(month>11){
         month=0;
         year=year+1;
         
         
     }
     drawMonth(month, year);
      //fetches todays events
     
     jQuery('.leftSide').load('eventCalendar/view/view_events.php', function(){
        jQuery('.eventsMother').show();
    });
 });
    
    
jQuery('#today').click(function(){
    window.location.href = "http://gonsave.com/musicCal";
});
   
</script>