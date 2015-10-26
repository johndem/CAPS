<?php 

session_start();

mysqli_set_charset($link, "utf8");

if (isset($_SESSION['admin'])) {

    include "create-link.php";

    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type == 'category') {
        $query = "DELETE FROM categories WHERE id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'dist') {
        $query = "DELETE FROM districts WHERE id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'skill') {
        $query = "DELETE FROM skills WHERE skill_id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'agegroup') {
        $query = "DELETE FROM agegroups WHERE id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'org') {
        $query = "DELETE FROM organisations WHERE org_id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'vol') {
        $query = "DELETE FROM user WHERE id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'news') {
        $query = "DELETE FROM news WHERE id=$id";

        if (mysqli_query($link, $query)) {
             echo "OK";
        } else {
             echo "Error";
        }

        mysqli_close($link);
    }
    elseif ($type == 'events') {
        $query = "SELECT org_id FROM events WHERE id = '$id'";
        $results = mysqli_query($link,$query);
        $row = mysqli_fetch_row($results);
        $org_id = $row[0];

        $query = "DELETE FROM events WHERE id = $id";

        if (mysqli_query($link, $query)) {

            $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$org_id','3','1','$id')";
            mysqli_query($link,$query);

            $query = "SELECT volunteerID FROM apply WHERE eventID = '$id'";
            $results = mysqli_query($link,$query);
            while ($row = mysqli_fetch_row($results)) {
                $vol_id = $row[0];
                $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$vol_id','9','0','$id')";
                mysqli_query($link,$query);
            }

            $q = "DELETE FROM apply WHERE eventID='$id'";
            mysqli_query($link, $q);

            echo "OK";
        } else {
            echo "Error";
        }

        mysqli_close($link);
    }

}

else {
    echo "Permission denied";
}


?>