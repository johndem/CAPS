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
        <script src="jq.js"></script>
		<script src="form-check.js"></script>
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
                <h1 class="center-title">Search for a volunteer opportunity</h1>
                
                <div class="aligner">
                    
                    <form action="search-results.php" method="get" >
                       

                        <div id="search-cat">
                            <div class="h3">Categories:</div>
                            <div>
                                <div id="radio-left">
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Education" /> 
                                        Education    
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="healthcare" />
                                        Healthcare      
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="environment" />
                                        Environment      
                                    </div>
                                </div>
                                <div id="radio-right">
                                    <div class="align-left">
                                        <input type="radio" name="category" value="animals" />
                                        Animals
                                    </div> 
                                    <div class="align-left">
                                        <input type="radio" name="category" value="emergency" />
                                        Emergency
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="communities" />
                                        Communities
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="search-select">
                            <div class="h3">Area:</div>
                            <div class="in">
                                <select name="areas">
                                    <option selected="selected" value="0">Select one</option>
                                    <option>Ανω Τούμπα</option>
                                    <option>Αμπελόκηποι Θεσσαλονίκης</option>
                                    <option>Ασβεστοχώρι</option>
                                    <option>Βάρνα</option>
                                    <option>Κωνσταντινοπολίτικα</option>
                                    <option>Σαράντα Εκκλησιές</option>
                                    <option>Κάτω Τούμπα</option>
                                    <option>Καλαμαριά</option>
                                    <option>Πυλαία</option>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Age group:</div>
                            <div class="in">
                                <select name="ages">
                                    <option selected="selected" value="0">Select one</option>
                                    <option value="kids">Kids</option>
                                    <option value="teens">Teens</option>
                                    <option value="adults">Adults</option>
                                    <option value="elders">Elders (55+)</option>
                                    <option value="groups">Groups</option>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Optional Skills:</div>
                            <div class="in">
                                <select id="skills" name="skills" multiple>
                                    <option disabled selected="selected">- Hold Ctr for multiple selection -</option>
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
                        </div>

                        <div class="search-select">
                            <div class="h3">Date:</div>
                            <input id="dob" class="in" maxlength="50" name="date" size="30" type="date" value="" />
                        </div>

                        <div id="go">
                            <input type="submit" class="submitBtn" name="submit" value="Search" />
                        </div> 

                    </form>
                    
                </div>
                
                <div id="reg-blanket">
                
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>