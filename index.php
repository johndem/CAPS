<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>

        
            <!-- registration -->
            <div class="registration">
                <ul>
                    <li class="reg"><a href="register.html">Register</a></li>
                    <li class="reg"><a href="login.html">Login</a></li>
                </ul>
            </div>
            

            <!-- masthead -->
            <div class="masthead">
                <h1 id="title">TEAM THESSALONIKI VOLUNTEER NETWORK</h1>
            </div>

            <!-- navigation -->
            <div class="navigation">
                <ul>
                    <li id="selected"><a href="index.html">HOME</a></li>
                    <li><a href="volunteers.html">VOLUNTEERS</a></li>
                    <li><a href="organisations.html">ORGANISATIONS</a></li>
                    <li><a href="calendar.html">CALENDAR</a></li>
                    <li><a href="account.html">ACCOUNT</a></li>
                </ul>
            </div>

            <!-- content -->
            <div class="content">
                <h1 class="center-title">Choose a category and get started!</h1>

                <div id="categories">

                    <div class="cat"><img id="hc" class="cat-img" src="hc-green.png"/>
                    </div>
                    <div class="cat"><img id="edu" class="cat-img" src="edu-green.png"/>
                    </div>
                    <div class="cat"><img id="em" class="cat-img" src="em-green.png"/>
                    </div>
                    <div class="cat"><img id="env" class="cat-img" src="env-green.png"/>
                    </div>
                    <div class="cat"><img id="com" class="cat-img" src="com-green.png"/>
                    </div>
                    <div class="cat"><img id="an" class="cat-img" src="an-green.png"/>
                    </div>
                </div>

                <div id="btnOpp">
                    <h3><a href="">More Opportunities!</a></h3>
                </div>
                
                
                
                <div id="news">
                    
                    <?php 
                        include 'display-news.php';
                    ?>
                    
                    
                    
                
                </div>
                
                
                
                
                <div id="home-blanket">
                
                </div>

            </div>

            <!-- footer -->
            <div class="footer">

                <div id="links">
                    <a href="">Login</a>
                    <a href="">Terms and Conditions</a>
                    <a href="">Privacy Policy</a>
                </div>

                <div id="copyright">
                    <p>Copyright &copy; 2015 JayTee. All Rights Reserved.</p>
                </div>

            </div>

        

    </body>


</html>