<?php 

$month = $_POST['month'];
$arrow = $_POST['arrow'];
$year = $_POST['year'];

mysqli_set_charset($link, "utf8");

$parser = date_parse($month);

$month = $parser['month'];

//$year = idate("Y");

$current_month = idate("m");

$results = "" .  '<table>
                        <thead>
                            <tr>
                                <th>Δευτέρα</th>
                                <th>Τρίτη</th>
                                <th>Τετάρτη</th>
                                <th>Πέμπτη</th>
                                <th>Παρασκευή</th>
                                <th>Σάββατο</th>
                                <th>Κυριακή</th>
                            </tr>
                        </thead>';

include 'create-link.php';


if ($arrow == 'right') {
    $month = $month + 1;
    if ($month == 13) {
        $month = 1;
        $year = $year + 1;
    }

    $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    if ($month<10) $date = '' . $year . '-0' . $month . '-';
        else $date = '' . $year . '-' . $month . '-';

    $month_start = strtotime($date . '01');

    $day = idate('w', $month_start) - 1;
    if ($day == -1) $day = 6;
    $td = 0;
    $days = 1;
    for ($i=0 ; $i<6 ; $i++) {
        $results = $results . '<tr>';
        for ($j=0 ; $j<7 ; $j++) {
            if ($td<$day or $days>$number) {
                $results = $results . '<td class="td-cells"><div></div></td>';
            }
            else {
                if ($days < 10) $newDate = $date .'0' . $days;
                else $newDate = $date . $days;
                //echo $newDate . "  ";
                $query = "SELECT id,title FROM events WHERE day = '$newDate' AND (status = '1' OR status= '2')";
                $results_sql = mysqli_query($link,$query);
                //$row = mysqli_fetch_row($results_sql);
                $results = $results . '<td class="td-cells"><div class="cal-num">' . $days . '</div>';
                while ($row = mysqli_fetch_row($results_sql)) {
                    $results  = $results . '<div class="cal-el"><span onclick="window.location = '. "'event.php?id=$row[0]'" . '">' . $row[1]  . '</a></span></div>';
                }
                $results = $results . '</td>';
                $days = $days + 1;
            }
            $td = $td + 1;

        }
        $results = $results . '</tr>';
    }
}
else if ($arrow == 'left') {

    $month = $month - 1;

        if ($month == 0 ) {
            $month = 12;
            $year = $year - 1;
        }


        $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        if ($month<10) $date = '' . $year . '-0' . $month . '-';
        else $date = '' . $year . '-' . $month . '-';

        $month_start = strtotime($date . '01');

        $day = idate('w', $month_start) - 1;
        if ($day == -1) $day = 6;
        $td = 0;
        $days = 1;
        for ($i=0 ; $i<6 ; $i++) {
            $results = $results . '<tr>';
                for ($j=0 ; $j<7 ; $j++) {

                    if ($td<$day or $days>$number) {
                        $results = $results . '<td class="td-cells"><div></div></td>';	
                    }
                    else {
                        if ($days < 10) $newDate = $date .'0' . $days;
                        else $newDate = $date . $days;
                        //echo $newDate . "  ";
                        $query = "SELECT id,title FROM events WHERE day = '$newDate' AND (status = '1' OR status= '2')";
                        $results_sql = mysqli_query($link,$query);
                        //$row = mysqli_fetch_row($results_sql);
                        $results = $results . '<td class="td-cells"><div class="cal-num">' . $days . '</div>';
                        while ($row = mysqli_fetch_row($results_sql)) {
                           $results  = $results . '<div class="cal-el"><span onclick="window.location = '. "'event.php?id=$row[0]'" . '">' . $row[1]  . '</a></span></div>';
                        }
                        $results = $results . '</td>';
                        $days = $days + 1;
                    }
                    $td = $td + 1;

                }
                $results = $results . '</tr>';
        }
}

//echo "Month: " . $month . " Arrow: " . $arrow;
echo $results . '</table>';

?>