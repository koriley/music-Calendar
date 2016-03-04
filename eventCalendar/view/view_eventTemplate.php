<?php

/*
 * This has be converted to a 'template' file so multiple controles can use this view.
 * 
 * now lets take the info from the database and make it human readable
 * We keep count outside the for statement for speed. We want this only run once instead of each 
 * incrament of for
 */
//$today = date(l); //on reacuring events, we only want to display the ones happenening today.
//echo $today;

echo' <div class="dayEvents">
        <table class="table borderless" style="width:100%;">
            <tr style="width:100%;">
                <td>
                    <a href="?eventNum='.$res[$i]['id'].'">' . $res[$i]['title'] . '</a>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="float:left">' . $res[$i]['startdate'] . ' - ' . $res[$i]['enddate'] . ' @' . $res[$i]['starttime'] . '</div><div style="float:right">' . $res[$i]['location'] . '</div>
                </td>
            </tr>
            <tr>
                <td>
                    ' . $res[$i]['description'] .
 ' </td>
            </tr>
        </table>
    </div>
</div>
     
                ';
