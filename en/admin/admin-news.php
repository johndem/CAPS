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
                
                <h1> News </h1>
                <span class="addItem"><a href="admin-news-form.php">Add New</a></span>

                <div class="listplz">   
                <?php 

                include "create-link.php";

                $query =" SELECT * FROM news";
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { ?>

                    <div class="listitem"> 

                    <table> 
                    <tr> 
                        <th>ID</th>
                        <th>Title </th>
                        <th>Description </th>
                        <th>Body </th>
                        <th>Actions </th>
                    </tr>

                    <tr> 

                        <td class="info-id"><?php echo $row[0]; ?></td>
                        <td class="info"><?php echo $row[1]; ?> </td>
                        <td class="info"><?php echo $row[2]; ?> </td>
                        <td class="link"><a href="../news.php?id=<?php echo $row[0];?>">Link</a></td>
                        <td class='actions'><span onclick="ondelete('news', <?php echo $row[0]; ?>)">Delete</span> <span onclick="window.location = 'admin-edit-news-form.php?id='+
                        <?php echo $row[0]; ?>">Edit</span></td>

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