<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vol4All</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>

            <div class="page-title">
                <div class="main-title"> Ο λογαριασμός μου </div>
                <h4>Πληροφορίες προφίλ</h4>
            </div>

                <?php
                mysqli_set_charset($link, "utf8");
                if(isset($_SESSION['org_id']) || isset($_SESSION['user'])) {
                    include '../back-end/find-user.php';
                ?>


                <div id="account">

                    <div id="info">
                        <div id="pic">
                            <img src="<?php if(isset($_SESSION['org_id'])) { echo $row[10]; } else { echo $row[12]; } ?>" />
                        </div>
                        <div id="personal-info">
                            <?php if(isset($_SESSION['org_id'])) { ?>
                              <table>
                                <tr>
                                  <th>Όνομα</th>
                                  <td><?php echo $row[4]; ?></td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td><?php echo $row[2]; ?></td>
                                </tr>
                                <tr>
                                  <th>Περιγραφή</th>
                                  <td id="orgs-desc"><?php echo $row[9]; ?></td>
                                </tr>
                              </table>

                            <?php } else if(isset($_SESSION['user'])) { ?>
                              <table>
                                <tr>
                                  <th>Όνομα</th>
                                  <td><?php echo $row[1]; ?></td>
                                </tr>
                                <tr>
                                  <th>Επίθετο</th>
                                  <td><?php echo $row[2]; ?></td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td><?php echo $row[4]; ?></td>
                                </tr>
                                <tr>
                                  <th>Ημ/νία γέννησης</th>
                                  <td><?php echo $row[11]; ?></td>
                                </tr>
                              </table>
                            <?php } ?>

                        </div>
                        <div class="account-label-in"><a href="edit-account.php">Επεξεργασία προφίλ &raquo;</a></div>
                    </div>
                    <?php  if(isset($_SESSION['vol_id'])) {  ?>
                      <h2> Eπιτεύγματα και Πόντοι </h2>
                      <h5> Δες πια έμβληματα έχεις πάρει πηγαίνοντας το δείκτη πάνω τους! </h5>
                      <div class="achievements">
                    <?php

                    include '../back-end/create-link.php';

                    mysqli_set_charset($link, "utf8");
                    session_start();

                       $user = $_SESSION['user'];
                       $query = "SELECT achievments.text, achievments.badge FROM achievments,earnedachievements,user WHERE achievments.id = earnedachievements.achiev_id AND earnedachievements.user_id = user.id AND user.username = '$user'";


                   $results = mysqli_query($link,$query);
                   $row = mysqli_fetch_row($results);

                   @mysqli_close($link);
                    while ($row = mysqli_fetch_row($results)) {

                    ?>

                      <div class="achievement">
                        <div class="badge" style="background-image: url('../images/badges/<?php echo $row[1]; ?>')" title="<?php echo $row[0]?>">

                        </div>
                        <!-- <div class="badge-text">
                            <?php echo $row[0]; ?>
                        </div> -->
                      </div>



                    <?php } ?>
                     <div id="points">Έχεις συγκεντρώσει 75 πόντους!</div>
                     </div>
                     <?php } ?>

                    <h2>Ειδοποιήσεις</h2>
                     <div class=notification-button onclick="notifications()"></div>

                    <div id="notification-box">
                        <?php

                        include '../back-end/create-link.php';
                        $id = 0;
                        $role = 0;

                        if (isset($_SESSION['vol_id'])) {
                            $id = $_SESSION['vol_id'];
                        }
                        else {
                            $id = $_SESSION['org_id'];
                            $role = 1;
                        }

                        $query = "SELECT notifications.date, messages.text ,notifications.id,events.title,events.id FROM notifications, messages, events WHERE notifications.user_id='$id' AND notifications.role='$role' AND notifications.not_id = messages.id AND notifications.event_id = events.id ORDER BY notifications.id DESC LIMIT 5";
                         $results = mysqli_query($link,$query);
                        while ($row = mysqli_fetch_row($results)) {

                        ?>

                            <div class="notification">
                                <div class="image"> </div>
                                <div class="message">
                                    <?php echo $row[1]; ?>
                                </div>
                                <?php if($row[4] != 0)  {?>
                                <div class="event-link">Σελίδα δράσης: <a href="event.php?id=<?php echo $row[4]; ?>"> <?php echo $row[3]; ?></a> </div>
                                <?php } ?>
                                <div class="date">
                                    <?php echo $row[0]; ?>
                                </div>
                            </div>

                           <?php } ?>
                           <a id="see-all" href=""> Όλες οι ειδοποιήσεις </a>
                    </div>

                    <?php if(!isset($_SESSION['org_id'])) { ?>

                    <?php } ?>

                    <div id="history">

                        <div id="tabbed_box_1" class="tabbed_box">

                            <?php if(isset($_SESSION['org_id'])) { ?>
                            <h2>Ιστορικό δράσεων οργανισμού</h2>
                            <div class="tabbed_area">

                                <ul class="tabs">
                                    <li><a href="#" title="content_1" class="tab active">Ενεργές δράσεις</a></li>
                                    <li><a href="#" title="content_2" class="tab">Ολοκληρωμένες δράσεις</a></li>
                                    <li><a href="#" title="content_3" class="tab">Ακυρωμένες δράσεις</a></li>
                                </ul>

                                <div id="content_1" class="tab-content">
                                    <ul>
                                        <?php include 'event-history-active.php'; ?>
                                    </ul>
                                </div>
                                <div id="content_2" class="tab-content">
                                    <ul>
                                        <?php include 'event-history-completed.php'; ?>
                                    </ul>
                                </div>
                                <div id="content_3" class="tab-content">
                                    <ul>
                                        <?php include 'event-history-cancelled.php'; ?>
                                    </ul>
                                </div>

                            </div>
                            <?php } else if(isset($_SESSION['user'])) { ?>
                            <h2>Ιστορικό εθελοντή/τριας</h2>
                            <div class="tabbed_area">

                                <ul class="tabs">
                                    <li><a href="#" title="content_1" class="tab active">Ολοκληρωμένες δράσεις</a></li>
                                    <li><a href="#" title="content_2" class="tab">Αιτούντες δράσεις</a></li>
                                </ul>

                                <div id="content_1" class="tab-content">
                                    <ul>
                                        <?php include 'volunteer-history.php'; ?>
                                    </ul>
                                </div>
                                <div id="content_2" class="tab-content">
                                    <ul>
                                        <?php include 'volunteer-apply-history.php'; ?>
                                    </ul>
                                </div>

                            </div>
                            <?php } ?>


                        </div>

                    </div>


                </div>
                <?php } ?>


                <div id="account-blanket">

                </div>

            </div>

            <!-- footer -->
            <?php include 'footer.php'; ?>

    </body>
</html>
