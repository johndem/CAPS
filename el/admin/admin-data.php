<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vol4All Admin</title>
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
                <div id="data-tables">
                <div class="left">
                    <h1> Κατηγορίες </h1> <span class="addItem" onclick="onAddNew('category')">Προσθήκη Νέας</span>
                    
                    <div class="listplz" style="width: auto; margin-left: 50px;">   
                    <?php 

                        include "create-link.php";

                        $query =" SELECT * FROM categories";
                        $results = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_row($results)) { ?>

                            <div class="listitem"> 

                                <table> 
                                    <tr> 
                                        <th>ID</th>
                                        <th>Όνομα</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr> 
                                        <td class="info-id"> <?php echo $row[0]; ?></td>
                                        <td class="info"><?php echo $row[1]; ?> </td>
                                        <td class='actions'><span onclick="ondelete('category', <?php echo $row[0]; ?>)">Διαγραφή</span> <span onclick="onEdit('category', 
                                        <?php echo $row[0]; ?>, '<?php echo $row[1]; ?>')">Επεξεργασία</span></td>
                                    </tr>
                                </table>

                            </div>

                    <?php } ?>

                    </div>
                </div>

                <div class="left"> 
                    <h1> Δεξιότητες </h1><span class="addItem" onclick="onAddNew('skill')">Προσθήκη Νέας</span>

                    <div class="listplz" style="width: auto; margin-left: 50px;">   
                    <?php 

                        include "create-link.php";

                        $query =" SELECT * FROM skills";
                        $results = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_row($results)) { ?>

                            <div class="listitem"> 

                                <table> 
                                    <tr> 
                                        <th>ID</th>
                                        <th>Value</th>
                                        <th>Όνομα</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr> 
                                        <td class="info-id"> <?php echo $row[0]; ?></td>
                                        <td class="info-id"><?php echo $row[1]; ?> </td>
                                        <td class="name"><?php echo $row[2]; ?> </td>
                                        <td class='actions'><span onclick="ondelete('skill', <?php echo $row[0]; ?>)">Διαγραφή</span> <span onclick="onEdit('skill', 
                                        <?php echo $row[0]; ?>, '<?php echo $row[2]; ?>')">Επεξεργασία</span></td>
                                    </tr>
                                </table>

                            </div>

                    <?php } ?>
        
                    </div>
                </div>

                <div class="left"> 
                    <h1> Ηλικιακές ομάδες </h1> <span class="addItem" onclick="onAddNew('agegroup')">Προσθήκη Νέας</span>

                    <div class="listplz" style="width: auto; margin-left:50px;">   
                    <?php 

                        include "create-link.php";

                        $query =" SELECT * FROM agegroups";
                        $results = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_row($results)) { ?>

                            <div class="listitem"> 

                                <table> 
                                    <tr> 
                                        <th>ID</th>
                                        <th>Όνομα</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr> 
                                        <td class="info-id"> <?php echo $row[0]; ?></td>
                                        <td class="info"><?php echo $row[1]; ?> </td>
                                        <td class='actions'><span onclick="ondelete('agegroup', <?php echo $row[0]; ?>)">Διαγραφή</span> <span onclick="onEdit('agegroup', 
                                        <?php echo $row[0]; ?>, '<?php echo $row[1]; ?>')">Επεξεργασία</span></td>
                                    </tr>
                                </table>

                            </div>

                    <?php    }    ?>
        
                    </div>
                </div>

                <div class="left"> 
                    <h1> Περιοχές </h1><span class="addItem" onclick="onAddNew('dist')">Προσθήκη Νέας</span>

                        <div class="listplz" style="width: auto; margin-left: 50px;">   
                        <?php 

                            include "create-link.php";

                            $query =" SELECT * FROM districts";
                            $results = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_row($results)) { ?>

                                <div class="listitem"> 

                                    <table> 
                                        <tr> 
                                            <th>ID</th>
                                            <th>Όνομα</th>
                                            <th>Actions</th>
                                        </tr>
                                        <tr> 
                                            <td class="info-id"> <?php echo $row[0]; ?></td>
                                            <td class="info"><?php echo $row[1]; ?> </td>
                                            <td class='actions'><span onclick="ondelete('dist', <?php echo $row[0]; ?>)">Διαγραφή</span> <span onclick="onEdit('dist', 
                                            <?php echo $row[0]; ?>, '<?php echo $row[1]; ?>')">Επεξεργασία</span></td>
                                        </tr>
                                    </table>

                                </div>

                        <?php } ?>

                        </div>
                    </div>
                

                    
                </div>
                
                <div id="home-blanket">

                    </div>
            </div>
        </div>

        <?php } ?>
        
    </body>

</html>