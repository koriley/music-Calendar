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

function drawMonth(month, year) {
    //we need to clear out the month thats there
    jQuery('#monthName').html('');
    jQuery('.myWeek').each(function() {
        jQuery(this).remove();
    });

    //lets find the width I have for this calendar
    var calWidth = jQuery('.rightSide').width();
//now lets divide it by7 days to set the with of each table cell
    var cellWidth = calWidth / 7;
//now we need to set the weeks to the right width
    jQuery('.table td').css({'width': cellWidth + 'px'});
    //lets make a readable representation of the month

    var thisMonth = new Array();
    thisMonth[0] = "January";
    thisMonth[1] = "February";
    thisMonth[2] = "March";
    thisMonth[3] = "April";
    thisMonth[4] = "May";
    thisMonth[5] = "June";
    thisMonth[6] = "July";
    thisMonth[7] = "August";
    thisMonth[8] = "September";
    thisMonth[9] = "October";
    thisMonth[10] = "November";
    thisMonth[11] = "December";
    var displayMonth = thisMonth[month];
    jQuery('#monthName').append(displayMonth + ' ' + day + ', ' + year);

//need to get the week day name for the event list
    var weekday = new Array(7);
    weekday[2] = "Monday";
    weekday[3] = "Tuesday";
    weekday[4] = "Wednesday";
    weekday[5] = "Thursday";
    weekday[6] = "Friday";
    weekday[7] = "Saturday";
    weekday[1] = "Sunday";


//now we need to know what day of the week this month started on
    var startDay = getMonthStartDay(month, year);
    var numDay = getNumberofDays(month, year);
//console.log(startDay);
//console.log(month+'/'+day+'/'+year);
    //console.log(numDay);
//jQuery('.calendar').html(month+'|'+day+'|'+year+' month start day='+startDay+'<br/>');
//build previous month days we will need to fill these in later
    var weekdays = 1;
    var weekNum = 1;
//alert(startDay);
    for (var i = 0; i < startDay; i++) {
        if ((weekdays > 1) && (weekdays <= 7)) {
            jQuery(".week_" + weekNum).append("<td style='width:" + cellWidth + "><div class='NTM' style='height:25px; '></div></td>");
            weekdays++;
        }
        if (weekdays === 1) {
            jQuery(".table").append("<tr class='myWeek week_" + weekNum + "'><td><div class='NTM' style='width:100%; height:25px; '></div></td>");
            weekdays++;
        }

    }
//build this month
    for (var k = 1; k <= numDay; k++) {
        if (weekdays > 7) {
            jQuery(".dayHeading").append('</tr>');
            weekdays = 1;
            weekNum++;
        }
        if ((weekdays > 1) && (weekdays <= 7)) {
            jQuery(".week_" + weekNum).append("<td style='width:" + cellWidth + "'><div data-day='" + k + "' data-dayName='" + weekday[weekdays] + "' class='NTM calDay' style='width:100%; height:25px;'>" + k + "</div></td>");
            weekdays++;

        }
        if (weekdays === 1) {
            jQuery(".table").append("<tr class='myWeek week_" + weekNum + "'><td><div data-day='" + k + "' data-dayName='" + weekday[weekdays] + "' class='NTM calDay' style='width:100%; height:25px;'>" + k + "</div></td>");
            weekdays++;
        }



    }
    jQuery('.calDay').click(function() {
        day = jQuery(this).data('day');
        dayName = jQuery(this).data('dayname');
        jQuery('#monthName').html('');
        jQuery('#monthName').append(displayMonth + ' ' + day + ', ' + year);
        jQuery('.leftSide').load('eventCalendar/view/view_events.php');
        //alert(day);
        //console.log(month+'/'+day+'/'+year);
    });



}


function getMonthStartDay(month, year) {


    return new Date(year, month, 1).getDay();

}

function getNumberofDays(m, y)
{


    // if month is Sept, Apr, Jun, Nov return 30 days
    if (/8|3|5|10/.test(m))
        return 30;

    // if month is not Feb return 31 days
    if (m != 1)
        return 31;

    // To get this far month must be Feb ( 1 )
    // if the year is a leap year then Feb has 29 days
    if ((y % 4 == 0 && y % 100 != 0) || y % 400 == 0)
        return 29;

    // Not a leap year. Feb has 28 days.
    return 28;
}
//this function looks to see if url arguments are passed to it.
function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}
;