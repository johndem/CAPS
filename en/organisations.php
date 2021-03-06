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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="jq.js"></script>
		<script src="form-check-add-event.js"></script>
    </head>
    <body>
        
        <!-- registration or username -->
        <?php //include 'log-state.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>
            
            <?php 
            mysqli_set_charset($link, "utf8");
            if(isset($_SESSION['org_id'])) { 
            ?>    
            <!-- <h1 class="center-title">Post a new volunteer opportunity</h1> -->
            <div class="page-title"> 
            <div class="main-title">Register a new volunteering opportunity</div>  
            <h4>Fill in the following information</h4>
            </div>
            <div class="aligner">

                <div id="results">
                    <ul id="res-ul"></ul>
                </div>

                <form>
                    <div class="div-cat"> <h1 class="cats">Main information</h1> </div>

                    <div class="label-in">
                        <div class="h3"> Title: * </div>
                        <div id="err-title" class="error-message"> </div>
                        <div id="title-span" class="img-span"></div>
                        <input required id="op-title" class="in" maxlength="100" name="title" size="30" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Short description: * </div>
                        <div id="err-desc" class="error-message"> </div>
                        <div id="desc-span" class="img-span"></div>
                        <textarea id="desc" class="for-text-area" cols="55" name="description" maxlength="400" rows="7" required></textarea>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Category: * </div>
                        <div id="err-category" class="error-message"> </div>
                        <div id="category-span" class="img-span"></div>
                        <select id="category" class="in" required>
                            <option value="0" disabled selected>Select one</option>
                            <?php
                            include '../back-end/create-link.php';
                            mysqli_set_charset($link, "utf8");
                            $query = "SELECT * FROM categories";
                            $results = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_row($results)) {
                                echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="div-cat"> <h1 class="cats">Event's image</h1> </div>

                    <div class="label-in">
                        <div class="h3"> You can upload up to three images for this event. </div>
                        <div id="file-buttons">
                            <input type="file" name="event-picture" id="event-pic">
                            <input type="file" name="event-picture2" id="event-pic2">
                            <input type="file" name="event-picture3" id="event-pic3">
                        </div>  
                    </div>

                    <div class="div-cat"> <h1 class="cats">Location</h1> </div>

                    <div class="label-in">
                        <div class="h3"> Address: * </div>
                        <div id="err-addr" class="error-message"> </div>
                        <div id="addr-span" class="img-span"></div>
                        <input id="address" class="in" maxlength="50" name="address" size="30" type="text" value="" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Street number: * </div>
                        <div id="err-str" class="error-message"> </div>
                        <div id="str-span" class="img-span"></div>
                        <input id="str"  class="in" min="1" max="9999" name="str"  type="number" value="" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Zipcode: * </div>
                        <div id="err-zip" class="error-message"> </div>
                        <div id="zip-span" class="img-span"></div>
                        <input id="zip"  class="in" name="zip" type="number" value="" min="10000" max="99999" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Area: * </div>
                        <div id="err-area" class="error-message"> </div>
                        <div id="area-span" class="img-span"></div>
                        <select id="area" class="in" required>
                            <option value="0" disabled selected>Select one</option>
                            <?php
                            include '../back-end/create-link.php';
                            mysqli_set_charset($link, "utf8");
                            $query = "SELECT * FROM districts";
                            $results = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_row($results)) {
                                echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                            }
                            ?>
                        </select>
                        </div>

                    <div class="div-cat"> <h1 class="cats">When</h1> </div>

                    <div class="label-in"> 
                        <div class="h3">Date: * </div>
                        <div id="err-day" class="error-message"> </div>
                        <div id="day-span" class="img-span"></div>
                        <input id="day" class="in" name="date" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3">Time: * </div>
                        <div id="err-time" class="error-message"> </div>
                        <div id="time-span" class="img-span"></div>
                        <input id="time" class="in" name="time" type="time" required/>
                    </div>


    <!--          <div class="label-in"> 
                    <div class="h3">Entire day: </div>
                      <input id="entire" class="in cb" name="ent" type="checkbox"/>
                     </div>

                <div class="label-in"> 
                    <div class="h3"> Repeat: </div>
                     <input id="rep" class="in cb" name="rep" type="checkbox"/>
                     </div>


                <div hidden class="label-in toggled">
                     <div class="h3">Repetition: * </div>
                         <select id="date" onchange="date()" class="in">
                          <option value="select">Select one</option>
                          <option value="onetime">One time</option>
                          <option value="everyday">Everyday</option>
                          <option value="weekly">Weekly</option>
                          <option value="monthly">Monthly</option>
                          <option value="annualy">Annualy</option>
                         </select>
                    <div hidden id="onetime"> 


                     <div class="label-in">
                    <div class="h3">Time: * </div>
                     <input id="time" class="in" maxlength="50" name="time" size="30" type="time"/>
                     </div>
                     </div>
                    </div>
            -->

                    <div class="div-cat"> <h1 class="cats">Additional Information</h1> </div>

                    <div class="label-in">
                        <div class="h3"> Age group: * </div>
                        <div id="err-agegroup" class="error-message"> </div>
                        <div id="agegroup-span" class="img-span"></div>
                        <select id="agegroup" class="in" required>
                            <option disabled selected="selected" value="0">Select one</option>
                            <?php
                                include '../back-end/create-link.php';
                                mysqli_set_charset($link, "utf8");
                                $query = "SELECT * FROM agegroups";
                                $results = mysqli_query($link,$query);

                                $i = 1;
                                while ($row = mysqli_fetch_row($results)) {
                                    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="label-in">
                        <div class="h3">Skill you're looking for: * </div>
                        <div id="err-skills" class="error-message"> </div>
                        <div id="skills-span" class="img-span"></div>
                        <select id="skills" class="in" multiple required>
                            <option disabled selected value="0">- Hold Ctr for multiple options -</option>
                            <?php
                            include '../back-end/create-link.php';
                            mysqli_set_charset($link, "utf8");
                            $query = "SELECT * FROM skills";
                            $results = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_row($results)) {
                                echo '<option label="' . $row[2] . '" value="' . $row[1] . '">' . $row[2] . '</option>';
                            }
                            ?>
                         </select>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Detailed description: * </div>
                        <div id="err-ddesc" class="error-message"> </div>
                        <div id="ddesc-span" class="img-span"></div>
                        <textarea id="ddesc" class="for-text-area" cols="55" name="detailed-description" maxlength="1500" rows="20" required></textarea>
                    </div>

                    <p id="required">* This field is required </p>
                </form>

                <div id="go">
                    <input type="submit" class="submitBtn" onclick="checkform()" id="sButton" name="submit" value="Post" />
                </div> 

            <?php } else { ?>


            <!-- <h1 class="center-title">Register your organisation and get started!</h1> -->
            <div class="page-title"> 
                <div class="main-title">Register a new volunteering opportunity</div>  
                <h4>You have to be logged in with an organization's account to add an new event</h4>
            </div>


            <div id="org-tab-default"> 

                <?php
                echo '<div class="side-widgets">';
                include 'recent-events-widget.php'; 
                echo '</div>';
                ?>

                <div id="present-orgs">

                    <div class="row">
                        <h2>Login with existed account</h2>
                        <div id="btnOrg">
                            <h3><a href="login.php">Login</a></h3>
                        </div>
                    </div>

                    <div class="row">
                        <h2>Register a new account </h2>
                        <div id="btnOrg">
                            <h3><a href="org-form.php">Register</a></h3>
                        </div>
                    </div>

<!--
                    <h2>Login with an existing organization account</h2>
                    <a href="login.php"></a>
                    <h2>or</h2>    
                    <h2>Register a new organization account</h2>
                    <a href="org-register.php"></a>
-->

                </div>

            </div>


            <?php } ?>
            </div>
                
            <div id="reg-blanket">

            </div>
                
        </div>
   
        <!-- footer -->
        <?php include 'footer.php'; ?>
       
    </body>
</html>