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

        //if (!isset($_SESSION['admin'])) { 
        //    header("Location: index.php");
    ?>


    <?php //} else { ?>

        <!-- masthead -->
        
        <div class="center-title"> <h3>ADMIN CONTROL PANEL</h3> </div>

        <!-- navigation -->
         <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="aligner">
                
                <h1> Pending Events </h1>

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
                        <th>Title </th>
                        <th>Category </th>
                        <th>Address </th>
                        <th>Street Num </th>
                        <th>Zipcode </th>
                        <th>Area </th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Agegroup </th>
                        <th>Skills </th>
                        <th>Actions </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[4]; ?> </td>
                        <td class="info"><?php echo $row[5]; ?> </td>
                        <td class="info"><?php echo $row[6]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="info"><?php echo $row[9]; ?>  </td>
                        <td class="info"><?php echo $row[10]; ?> </td>
                        <td class="info"><?php echo $row[11]; ?> </td>
                        <td class='actions'><span onclick="window.location = 'mailto-form.php?mailToOrganization=<?php echo $row[1] ?>'">MailTo</span><span onclick="onEditEvent('approve', <?php echo $row[0]; ?>, '1')">Approve</span> <span onclick="onEditEvent('reject', <?php echo $row[0]; ?>, '-1')">Reject</span></td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>
                
                
                
                <h1> On-going Events </h1>

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
                        <th>Title </th>
                        <th>Category </th>
                        <th>Address </th>
                        <th>Street Num </th>
                        <th>Zipcode </th>
                        <th>Area </th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Agegroup </th>
                        <th>Skills </th>
                        <th>Actions </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[4]; ?> </td>
                        <td class="info"><?php echo $row[5]; ?> </td>
                        <td class="info"><?php echo $row[6]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="info"><?php echo $row[9]; ?>  </td>
                        <td class="info"><?php echo $row[10]; ?> </td>
                        <td class="info"><?php echo $row[11]; ?> </td>
                        <td class='actions'><span onclick="window.location = 'mailto-form.php?mailToOrganization=<?php echo $row[1] ?>'">MailTo</span><span onclick="onEditEvent('suspend', <?php echo $row[0]; ?>, '0')">Suspend</span><span>Edit</span><span onclick="ondelete('events', <?php echo $row[0]; ?>)">Delete</span>   </td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>
                
                
                
                <h1> Completed Events </h1>

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
                        <th>Title </th>
                        <th>Category </th>
                        <th>Address </th>
                        <th>Street Num </th>
                        <th>Zipcode </th>
                        <th>Area </th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Agegroup </th>
                        <th>Skills </th>
                    </tr>

                    <tr> 

                        <td class="info-id"> <?php echo $row[0]; ?></td>
                        <td class="info"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="info"><?php echo $row[3]; ?>  </td>
                        <td class="info"><?php echo $row[4]; ?> </td>
                        <td class="info"><?php echo $row[5]; ?> </td>
                        <td class="info"><?php echo $row[6]; ?>  </td>
                        <td class="info"><?php echo $row[7]; ?> </td>
                        <td class="info"><?php echo $row[8]; ?> </td>
                        <td class="info"><?php echo $row[9]; ?>  </td>
                        <td class="info"><?php echo $row[10]; ?> </td>
                        <td class="info"><?php echo $row[11]; ?> </td>

                    </tr>

                    </table>

                    </div>


                <?php } ?>
                </div>

                <div id="home-blanket">

                </div>
                
            </div>
        </div>

    <?php //} ?>
        
    </body>

</html>