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
        <script src="when-jq.js"></script>
        
    </head>
    <body>
	
        
        <div>
        
            <!-- registration or username -->
            <?php include 'log-state.php'; ?>

            <!-- masthead -->
            <?php include 'masthead.php'; ?>

            <!-- navigation -->
            <?php include 'navigation.php'; ?>
            
            <!-- content -->
            <div class="content">
                <h1 class="center-title">Post a new volunteer opportunity</h1>
                <div class="aligner">
                    
                    <div id="results">
                        <ul id="res-ul">
                        </ul>
                    </div>
                    <form>
                       <div class="div-cat"> <h1 class="cats">Basic Information</h1> </div>
                        
                        <div class="label-in">
                         <div class="h3"> Title: * </div>
                            <input required id="op-title" class="in" maxlength="100" name="title" size="30" type="text" value="" />
                        </div>
                       
                        <div class="label-in">
                         <div class="h3"> Category: * </div>
                             <select id="category" class="in">
                              <option value="select">Select One</option>
                              <option value="education">Education</option>
                              <option value="healthcare">Healthcare</option>
                              <option value="evnironement">Evnironement</option>
                              <option value="animals">Animals</option>c
                              <option value="emergency">Emergency</option>
                              <option value="communities">Communities</option>

                             </select>
                        </div>
                        
                    <div class="div-cat"> <h1 class="cats">Where</h1> </div>
                    <div class="label-in">
                         <div class="h3"> Address: *</div>
                               <input id="address" class="in" maxlength="50" name="address" size="30" type="text" value="" />
                        </div>
                        
                        <div class="label-in">
                         <div class="h3"> Street Number: *</div>
                                <input id="str-num"  class="in" maxlength="50" name="str" size="30" type="number" value="" />
                        </div>
                        
                        <div class="label-in">
                         <div class="h3"> Zip Code: *</div>
                                <input id="zip"  class="in" maxlength="50" name="zip" size="30" type="number" value="" />
                        </div>
                        <div class="label-in">
                         <div class="h3"> Area: * </div>
                             <select id="area" class="in">
                              <option value="select">Select one</option>
                              <option value="onetime">Ανω Τούμπα</option>
                              <option value="onetime">Αμπελόκηποι Θεσσαλονίκης</option>
                              <option value="onetime">Ασβεστοχώρι</option>
                              <option value="onetime">Βάρνα</option>
                              <option value="onetime">Κωνσταντινοπολίτικα</option>
                              <option value="onetime">Σαράντα Εκκλησιές</option>
                              <option value="onetime">Κάτω Τούμπα</option>
                              <option value="onetime">Καλαμαριά</option>
                              <option value="onetime">Πυλαία</option>
                             </select>
                        </div>
                       <div class="div-cat"> <h1 class="cats">When</h1> </div>
                     
                     <div class="label-in"> 
                        <div class="h3">Day: * </div>
                         <input id="day" class="in" maxlength="50" name="date" size="30" type="date" />
                         </div>
                    
                    <div class="label-in">
                        <div class="h3">Time: * </div>
                         <input id="time" class="in" maxlength="50" name="time" size="30" type="time"/>
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
                         <div class="h3"> Age Group: * </div>
                             <select id="selectr" class="in">
                                                             

                              <option disabled value="0">Select One</option>
                              <option value="1">Kids</option>
                              <option value="2">Teens</option>
                              <option value="3">Elders (55+)</option>
                              <option value="4">Groups</option>
                             </select>
                        </div>
                        
                        <div class="label-in">
                         <div class="h3">Optional Skills: * </div>
                             <select id="skills" class="in" multiple>
                                 <option disabled value="hold">- Hold Ctr for multiple selection -</option>
                                <option label="Administration" value="37">Administration</option>
                                <option label="Advice, Information and Support" value="38">Advice, Information and Support</option>
                                <option label="Architecture, Building and Construction" value="39">Architecture, Building and Construction</option>
                                <option label="Arts, Entertainment and Music" value="40">Arts, Entertainment and Music</option>
                                <option label="Befriending, Buddying and Mentoring" value="41">Befriending, Buddying and Mentoring</option>
                                <option label="Business, Management and Research" value="42">Business, Management and Research</option>
                                <option label="Campaigning and Lobbying" value="43">Campaigning and Lobbying</option>
                                <option label="Caring" value="44">Caring</option>
                                <option label="Catering" value="45">Catering</option>
                                <option label="Counselling" value="46">Counselling</option>
                                <option label="Driving" value="47">Driving</option>
                                <option label="Events and Stewarding" value="48">Events and Stewarding</option>
                                <option label="Finance and accountancy" value="49">Finance and accountancy</option>
                                <option label="First Aid" value="51">First Aid</option>
                                <option label="Fundraising" value="50">Fundraising</option>
                                <option label="Gardening and Conservation" value="52">Gardening and Conservation</option>
                                <option label="General and Helping" value="53">General and Helping</option>
                                <option label="Group Volunteering" value="54">Group Volunteering</option>
                                <option label="Hostel Work" value="55">Hostel Work</option>
                                <option label="Languages" value="56">Languages</option>
                                <option label="Legal and the Law" value="57">Legal and the Law</option>
                                <option label="Local Events" value="58">Local Events</option>
                                <option label="Manual Work and DIY" value="59">Manual Work and DIY</option>
                                <option label="Marketing, Media and Communications" value="60">Marketing, Media and Communications</option>
                                <option label="Officials" value="61">Officials</option>
                                <option label="Retail and Charity Shops" value="62">Retail and Charity Shops</option>
                                <option label="Sports and Coaching" value="63">Sports and Coaching</option>
                                <option label="Teaching, Training and Leading" value="64">Teaching, Training and Leading</option>
                                <option label="Technology and the Internet" value="65">Technology and the Internet</option>
                                <option label="Trusteeship and Committees" value="66">Trusteeship and Committees</option>
                                <option label="Youth Work" value="67">Youth Work</option>
                             </select>
                        </div>
                        
                       
                        
                        <div class="label-in">
                         <div class="h3"> Short description: * </div>
                           <textarea class="for-text-area" cols="55" name="description" maxlength="500" rows="10" ></textarea>
                        </div>
                    
                    <p id="required">* This field is required </p>
                    
                    <div id="go">
                        <input type="submit" class="submitBtn" onclick="checkform()" id="sButton" name="submit" value="Post" />
                    </div> 
                   </form>
                </div>
                
                <div id="reg-blanket">
                
                </div>
                
            </div>
                
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>