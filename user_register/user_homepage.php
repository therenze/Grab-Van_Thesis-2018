<!--/NAVIGATION BAR: gav_homepage.php/-->
<?php include('NavigationBar/user_homepageNav.php');?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/gav_homepageTemplate.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="javascript/loader.js" type="text/javascript"></script>
        <script src="javascript/header-text-slider.js" type="text/javascript"></script>
        <script src="javascript/image-slider.js" type="text/javascript"></script>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
    </head>
    
    
      <!--/THIS IS THE RIGHTSIDE MINI MENUS/-->
      <a href="#section1" class="btn-back">Back to top</a>
      <a href="#section5" class="btn-back4">Contact us</a>
      <a href="#section4" class="btn-back1">About us</a>
      <a href="#section3" class="btn-back2">Cool updates</a>
      <a href="#section2" class="btn-back3">How it works</a>

     
<body onload="hideloader()" id="section1">
    <div id="loading"></div><!--/THIS IS THE LOADING SPINNER/-->
        <header>
            <img id="header" src="image/cover-image.png">
        </header><!--/THIS IS THE HEADER IMAGE/-->
    
    
    <!--/TEXT SLIDER/-->
    <div id="bubblebox"><!--/TEXT SLIDER CONTAINER bubblebox/-->
        <div id="bubblecontent"><!--/TEXT SLIDER CONTENT bubblecontent/-->
            <img src="image/image-text1.png">
        </div>
        <div id="bubbles"><!--/TEXT SLIDER CUROSAL bubbles/-->
            <div onclick="bubbles(0); clearInterval(intrvl);" style="background:white;"></div>
            <div onclick="bubbles(1); clearInterval(intrvl);"></div>
        </div>
        <div id="online-icon"><!--/HEADER IMAGE MINI ICONS/-->
            <center>
                <img src="image/image-icon5.png" alt=""/>
                <img src="image/image-icon6.png" alt=""/>
                <img src="image/image-icon7.png" alt=""/>
            </center>
        </div>   
    </div>

    

<div id="wrapper"><br><br><!--/WRAPPER OF CONTENT/-->
    <div class="section" id="section2"></div>         
    <div class="content_top"><!--/CONTENT TOP, HEADER TEXT/-->
        <div class="content_bottom-title">
            <label>HOW IT WORKS<label>
                <p>GaV(Grab a Van), Provides proper way of transportation, 
                   safety and the security of your stuffs while traveling, 
                   and also GaV will pick you up in your home on your specific time of reservation,
                   and bring you to the place where you want to go.
                </p>
        </div>
    </div>
    
    
    <div class="content_center" ><br><!--/CONTENT CENTER, WRAPPER/-->
        <div id="carousel"><!--/IMAGE SLIDER, WRAPPER/-->
            <div id="slides"><!--/IMAGE SLIDER CONTENT, WRAPPER/-->
                <div class="slide-container"><!--/IMAGE SLIDER CONTENT , WRAPPER TWO/-->
            
                    <li class="slide"><!--/IMAGE SLIDER INDIVIDUAL CONTENT, WRAPPER/-->
                        <img src="image/img-1.png" alt=""/>
                        <div class="slide-content">
                            <label>Step 1. MAKE A RESERVATION</label>
                                <p>
                                Search and select a Van that's ideal for you.
                                <br><br>
                                Type in your destination and picking place.
                                <br><br>
                                Input in your picking time and date.
                                <br><br>
                                And complete the inputing process.
                                <br><br>
                                Your ready for the next step.
                                </p>
                        </div>
                    </li>
            
                    <li class="slide">
                        <img src="image/img-3.png" alt=""/>
                        <div class="slide-content">
                            <label>Step 2. PAY YOUR RESERVATION</label>
                            <p>
                            You can ether choose Online payment or sending it to palawan or smart money
                            <br><br>
                            Complete the payment process.
                            <br><br>
                            Then your ready for the next step.

                            </p>
                        </div>
                    </li>
            
                    <li class="slide">
                        <img src="image/img-2.png" alt=""/>
                        <div class="slide-content">
                            <label>Step 3. CONFIRMATION</label>
                            <p>
                            Wait for booking confirmation. 
                           <br><br>
                           Double check your confirmed booking.
                           <br><br>
                           You can also print your reservation for proving purposes.
                           <br><br>
                           Printed reservation can serve as ride ticket.
                            </p>
                        </div>
                    </li>
                    
                    <li class="slide">
                        <img src="image/img-01.png" alt=""/>
                        <div class="slide-content">
                            <label>Step 4. WAITING FOR YOUR RIDE</label>
                            <p>
                            GaV will automatically pick you before your picking time. 
                            <br><br>
                            Their's no need to worry about your schedule's
                            <br><br>
                            Our driver's can be trusted 100 percent.
                            <br><br>
                            Your safety is our most priority.
                            <br><br>
                            You can also give the printed reservation at the driver.
                            </p>
                        </div>
                    </li>
                </div>
            </div>
            <div class="btn-bar">
             <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
            </div>
        </div>
    </div>
                
                
                
    <div class="section" id="section3"></div>
    <div class="content_bottom"><!--/CONTENT BOTTOM WRAPPER, IMAGE HOVER/-->
        
        <div class="content_bottom-title">
            <label>
            &nbsp;COOL UPDATES
            <label>
            <p>
            &nbsp;&nbsp;
            Relax, enjoy and take time to read our coolest updates of the year.
            </p>
        </div>
        
        <div class="gc_news1-long-img">
            <img  src="image/hover-image5.png" class="image" >
            <div class="overlay">
                <div class="text">GaV services is now available to all palces here in Surigao,
                    <br>GaV can now pickyou-up anytime and anywhere.
                    <br><br>No more worries of waiting!.
                </div>
            </div>
        </div>
                
        <div class="gc_news1-square-img">
            <img  src="image/hover-image4.png" class="image2">
            <div class="overlay">
                <div class="text">GaV is working with our first app and, 
                    <br>Grab a Van mobile application will soon be 
                    <br>release on Appstore.
                    <br><br>Download it for free!.
                </div>
            </div>
        </div> 
                
        <div class="gc_news1-square-img">
            <img  src="image/hover-image1.png" class="image2">
            <div class="overlay">
                <div class="text">All new vehicle's is available for booking
                    <br>with a much lessen price for 1 month.
                    <br><br>Enjoy it and feel relax!.
                </div>
            </div>
        </div>
                
        <div class="gc_news1-square-img">
            <img  src="image/hover-image2.png" class="image2">
            <div class="overlay">
                <div class="text">You can now use your favorite card's
                    <br>to pay as online.
                </div>
            </div>
        </div>
                
        <div class="gc_news1-square-img">
            <img  src="image/hover-image3.png" class="image2">
            <div class="overlay">
                <div class="text">GaV is responsible for everything that will
                    <br>happen to you.
                    <br><br>Feel safe with GaV!.
                </div>
            </div>
        </div>
    
    </div>
 
    <div class="content_bottom-join"><!--/BANNER WRAPPER FRIVE WITH US/-->
       <img src="image/2.jpg">
       <div class="content_bottom-join-content">
            <label>DRIVE WITH US</label>
            <p> Have the peace of mind knowing who's riding in your car.</p>
            <p>Earn cash by utilizing what you already have, your driving skills.</p>
            <h4>Contact:</h4> 
            Smart: 09487216176
            <br>
            Globe: 09074875123
            <br><br>
            Visit:  Gav Office,
                    2251 Chino Roces Ave.,
                    Surigao City
       </div>
    </div>
    <div class="section" id="section4"></div>
    <div class="content_bottom-mvg"  ><!--/MISSION VISSION COMMITMENT WRAPPER/-->
        <div class="content_bottom-title">
            <label>
            &nbsp;ABOUT US
            </label>
            <p>
            &nbsp;&nbsp;
            Take you time to read our mission, vission and commitment.
            </p>
        </div>
        <br><br><br>
        
        <div class="gc_news">
            <center><label><img src="image/mission.png">
        </div>
                    
        <div class="gc_news">
            <center><img src="image/vision.png">
        </div>
                    
        <div class="gc_news">
            <center><img src="image/commitment.png"></center>
        </div>
    </div>
             
             
             
    <div class="bottom-information" id="section5" ><!--/CONTACT US WRAPPER/-->
    <center><img src="image/s.png"></center>
    <div id="bottom-information1">
        <div id="bottom-info-body">
                     <br><br><br>
                     <h3>GaV Office</h3> 
                    12/F Gav Office Wilcon
                    IT Hub,<br>
                    2251 Chino Roces Ave.,
                    Surigao City
        </div>
        <div id="bottom-info-body">
                     <br><br><br>
                     <h3>Company Man.</h3> 
                    Mr/Mrs. This is a sample
                    Narciso St., Surigao City<br>
                    <br>
                    Smart: 09487216176
                    Globe: 09074875123
        </div>
        <div id="bottom-info-body">
                     <br><br><br>
                     Contact Us.
                     <br><br>
                     About Us.
        </div>
    </div>
</div>
            
             
 </div><!--/END OF WRAPPER/-->           
<div id="footer"><!--/FOOTER/-->
<p><font color="white">Copyright </font> &copy; <br>          
    GaV - Grab a Van Surigao</p>
</div>
</body>
</html>
