<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TEAM THESSALONIKI VOLUNTEER NETWORK</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="form-check.js"></script>
        <script src="jq.js"> </script>
    </head>
    <body>

    <?php 

    session_start();

    mysqli_set_charset($link, "utf8");

    if (!isset($_SESSION['admin'])) { 
        header("Location: index.php");
    
    ?>

    <?php } else { ?>

        <!-- masthead -->
        
        <div class="center-title"> <h3>ADMIN CONTROL PANEL</h3> </div>

        <!-- navigation -->
         <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="aligner">
                
                <h1> Pending Δράσεις </h1>

                <div class="listplz">   
                <?php 

                include "create-link.php";

                $query =" SELECT * FROM events WHERE status='0'";
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { ?>

                    <div class="listitem"> 

                    <table> 
                    <tr> 
                        <th>ID</th>
                        <th>ORG ID </th>
                        <th>Τίτλος </th>
                        <th>Κατηγορία </th>
                        <th>Περιοχή </th>
                        <th>Ημ/νία</th>
                        <th>Περιγραφή </th>
                        <th>Actions </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info-org-id"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="link"><a href="../event.php?id=<?php echo $row[0];?>">Link</a></td>
                        <td class='actions'><span onclick="window.location = 'mailto-form.php?mailToOrganization=<?php echo $row[1] ?>'">MailTo</span><span onclick="onEditEvent('approve', <?php echo $row[0]; ?>, '1')">Αποδοχή</span> <span onclick="onEditEvent('reject', <?php echo $row[0]; ?>, '-1')">Απόρριψη</span></td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>
                
                
                
                <h1> Τρέχοντες Δράσεις </h1>

                <div class="listplz">   
                <?php 

                include "create-link.php";

                $query =" SELECT * FROM events WHERE status='1'";
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { ?>

                    <div class="listitem"> 

                    <table> 
                    <tr> 
                        <th>ID</th>
                        <th>ORG ID </th>
                        <th>Τίτλος </th>
                        <th>Κατηγορία </th>
                        <th>Περιοχή </th>
                        <th>Ημ/νία</th>
                        <th>Περιγραφή </th>
                        <th>Actions </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info-org-id"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="link"><a href="../event.php?id=<?php echo $row[0];?>">Link</a></td>
                        <td class='actions'><span onclick="window.location = 'mailto-form.php?mailToOrganization=<?php echo $row[1] ?>'">MailTo</span><span onclick="onEditEvent('suspend', <?php echo $row[0]; ?>, '0')">Αναστολή</span><span>Επεξεργασία</span>   </td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>
                
                
                
                <h1> Ολοκληρωμένες Δράσεις </h1>

                <div class="listplz">   
                <?php 

                include "create-link.php";

                $query =" SELECT * FROM events WHERE status='2'";
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { ?>

                    <div class="listitem"> 

                    <table> 
                    <tr> 
                        <th>ID</th>
                        <th>ORG ID </th>
                        <th>Τίτλος </th>
                        <th>Κατηγορία </th>
                        <th>Περιοχή </th>
                        <th>Ημ/νία</th>
                        <th>Περιγραφή </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info-org-id"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="link"><a href="../event.php?id=<?php echo $row[0];?>">Link</a></td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>

                <div id="home-blanket">

                </div>
                
            </div>
        </div>

    <?php } ?>
        
    </body>

</html>