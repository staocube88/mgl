<?php
require_once('function.php');
connectdb();
session_start();



$general = mysql_fetch_array(mysql_query("SELECT sitetitle FROM general_setting WHERE id='1'"));
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from startupwebtech.com/templates/massketing/main/connected-particles-animation/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 03:43:07 GMT -->
<head>
<meta charset="utf-8">
<title>Massketing</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome Icons -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Menu Corner Morph -->
<link rel="stylesheet" type="text/css" href="assets/css/cornermorph.css" />

<!-- Custom Style Sheet -->
<link href="assets/css/style.css" rel="stylesheet">

<!--<link rel="shortcut icon" href="img/favicon.png">-->

</head>

<body>

<!-- =========================
     Pre-loader 
============================== -->

<div id="loading">
  <div id="loading-center">
    <div id="loading-center-absolute">
      <div id="object"></div>
    </div>
  </div>
</div>
<div class="menu-wrap">
  <nav class="menu">
    <ul class="link-list">
      <li><a class="scroll" href="#header">Massketing Intro</a></li>
      <li><a class="scroll" href="#we-build">Building Relationship</a></li>
      <li><a class="scroll" href="#what-we-do">What We Do</a></li>
      <li><a class="scroll" href="#powerful-tools">Powerful Tools</a></li>
      <li><a class="scroll" href="#popular">Real Time Reports</a></li>
      <li><a class="scroll" href="#our-client">Our Clients</a></li>
      <li><a class="scroll" href="#affiliate">Get Affialiate</a></li>
    </ul>
  </nav>
</div>
<button class="menu-button" id="open-button"><i class="fa fa-bars" aria-hidden="true"></i></button>
<div class="content-wrap"></div>
<!-- =========================
     Background Particles 
============================== -->
<div id="particles-js"></div>

<!-- =========================
     Section1 - Header   
============================== -->
<header id="header">
  <div class="container">
    <div class="col-sm-6">
      <div class="logo"><a href="#"><img alt="" src="img/company.png"></a></div>
    </div>
    <div class="col-sm-6">
      <ul class="social-icon">
        <li><a href="#"><i class="fa fa-facebook"></i><span></span></a></li>
        <li><a href="#"><i class="fa fa-twitter"><span></span></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"><span></span></i></a></li>
      </ul>
    </div>
    <div class="col-xs-12">
      <h1>Massketing, world-wide
        affiliate marketing network.</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh neque, 
        convallis ut interdum a, consequat sit amet mauris. Vivamus sed tincidunt enim.</p>
      <a href="<?php echo $baseurl; ?>/register" class="button scroll">Sign Up</a> <a href="<?php echo $baseurl; ?>/login" class="button scroll">Login</a> </div>
  </div>
</header>

<!-- =========================
     Section2 - Sponsors  
============================== -->
<div id="sponsors">
  <div class="container">
    <div class="col-xs-12 col-sm-6 col-md-3 column"> <a class="sponsor" href="#"><img alt="" src="img/sponsor.png"></a> </div>
    <div class="col-xs-12 col-sm-6 col-md-3 column"> <a class="sponsor" href="#"><img alt="" src="img/sponsor.png"></a> </div>
    <div class="col-xs-12 col-sm-6 col-md-3 column"> <a class="sponsor" href="#"><img alt="" src="img/sponsor.png"></a> </div>
    <div class="col-xs-12 col-sm-6 col-md-3 column"> <a class="sponsor" href="#"><img alt="" src="img/sponsor.png"></a> </div>
  </div>
</div>

<!-- =========================
     Section3 - We Build  
============================== -->
<section id="we-build">
  <div class="container reveal-bottom-fade"> 
    <!-- Title -->
    <div class="col-xs-12 text-center">
      <h2>WE BUILD A STRONG RELATIONSHIP<br>
        AT ALL THREE LEVELS</h2>
      <div class="seprator less"></div>
    </div>
    <!-- /End Title --> 
    <!-- Build Box -->
    <div class="col-xs-12 col-md-4">
      <h3>ADVERTISERS</h3>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius.</p>
    </div>
    <div class="col-xs-12 col-md-4">
      <h3>PUBLISHERS</h3>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius.</p>
    </div>
    <div class="col-xs-12 col-md-4">
      <h3>CONSUMERS</h3>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius.</p>
    </div>
    <!-- /End Build Box --> 
    <!-- Approach -->
    <div class="col-xs-12 text-center figure reveal-bottom-fade"> <img alt="" src="img/figure.png">
      <h3 class="figure-title">OUR APPROACH IS SIMPLE YET EFFECTIVE</h3>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius.</p>
    </div>
    <!-- /End Approach --> 
  </div>
</section>

<!-- =========================
     Section3 - What We Do   
============================== -->
<section id="what-we-do">
  <div class="container"> 
    <!-- Video -->
    <div class="col-md-6 reveal-left-fade">
      <iframe src="https://www.youtube.com/embed/pR1iomH6tTg" allowfullscreen></iframe>
    </div>
    <!-- /End Video --> 
    <!-- Right -->
    <div class="col-md-6 reveal-right-fade">
      <h2>WHAT WE DO AT<br>
        MASSKETING WORLD WIDE ?</h2>
      <div class="seprator"></div>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius.Omnis commodo consequat ei mea. Movet praesent postulant mea at.</p>
      <ul class="services-list">
        <li>Omnis commodo consequat ei mea.</li>
        <li>Movet praesent postulant mea at, at nam dolorem lucilius.</li>
        <li>Omnis commodo consequat ei mea.</li>
      </ul>
    </div>
    <!-- /End Right --> 
  </div>
</section>

<!-- =========================
     Section4 - Powerful Tools   
============================== -->
<section id="powerful-tools">
  <div class="container"> 
    <!-- Title -->
    <div class="col-xs-12 text-center reveal-bottom-fade">
      <h2>POWERFUL TOOLS TO TARGET<br>
        MASSIVE AUDIENCE</h2>
      <div class="seprator"></div>
      <p class="padd-both">Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem cu lucilius. Praesent postulant mea at, at nam dolorem cu lucilius.</p>
    </div>
    <!-- /End Title -->
    <div class="col-md-6 column"> 
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle one-tone"><i class="fa fa-rocket"></i></div>
        <h3>LANDING PAGES</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
      
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle two-tone"><i class="fa  fa-envelope"></i></div>
        <h3>NEWSLATTERS</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
      
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle three-tone"><i class="fa fa-newspaper-o"></i></div>
        <h3>ADVERTISING BANNERS</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
    </div>
    <div class="col-md-6 column"> 
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle one-tone"><i class="fa fa-tasks"></i></div>
        <h3>OPT-IN FORMS</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
      
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle two-tone"><i class="fa fa-link"></i></div>
        <h3>REFERRAL LINKS</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
      
      <!-- Tool -->
      <div class="tools-box reveal-right-delay">
        <div class="tool-circle three-tone"><i class="fa fa-bar-chart"></i></div>
        <h3>STATS AND COUNTERS</h3>
        <p>Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem culucilius. Soleat  interesset mea cu.</p>
      </div>
      <!-- /End Tool --> 
    </div>
  </div>
</section>

<!-- =========================
     Section5 - Popular   
============================== -->
<section id="popular">
  <div class="container"> 
    <!--Popular Lef -->
    <div class="col-md-7">
      <h2>POPULAR<br>
        REAL-TIME REPORT & CHARTS</h2>
      <div class="seprator"></div>
      <p>Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius. Omnis commodo consequat ei mea. Movet praesent postulant mea at. Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius. Omnis commodo consequat ei mea. Movet praesent postulant mea at. </p>
    </div>
    <!-- /End Popular Left --> 
    <!-- Popular Right -->
    <div class="col-md-5 laptop-img stat-shadow"><img class="reveal-top" alt="" src="img/stats.png"></div>
    <!-- /End Popular Right --> 
  </div>
</section>

<!-- =========================
     Section6 - Our Client   
============================== -->
<section id="our-client">
  <div class="container"> 
    <!-- Title -->
    <div class="col-xs-12 reveal-bottom-fade">
      <h2>WHAT OUR CLIENTS SAYS<br>
        ABOUT US ?</h2>
      <div class="seprator less"></div>
    </div>
    <!-- /End Title --> 
    <!-- Client -->
    <div class="col-md-4 column reveal-left-fade"> <img alt="" class="client-img client-one-tone" src="img/client1.png">
      <p><i>"Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius. Omnis commodo at consequat ei mea. Movet praesent nam postulant mea at. Omnis commodo consequat ei mea. Movet praesent postulant mea at."</i></p>
      <h3>JESSICA DOE</h3>
      <h5 class="client-one-tone">Massketing Client</h5>
    </div>
    <!-- /End Client --> 
    
    <!-- Client -->
    <div class="col-md-4 column reveal-bottom-fade"> <img alt="" class="client-img client-two-tone" src="img/client2.png">
      <p><i>"Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius. Omnis commodo at consequat ei mea. Movet praesent nam postulant mea at. Omnis commodo consequat ei mea. Movet praesent postulant mea at."</i></p>
      <h3>JONATHAN DOE</h3>
      <h5 class="client-two-tone">Massketing Client</h5>
    </div>
    <!-- /End Client --> 
    
    <!-- Client -->
    <div class="col-md-4 column reveal-right-fade"> <img alt="" class="client-img client-three-tone" src="img/client3.png">
      <p><i>"Omnis commodo consequat ei mea. Movet praesent postulant mea at, at nam dolorem lucilius. Omnis commodo at consequat ei mea. Movet praesent nam postulant mea at. Omnis commodo consequat ei mea. Movet praesent postulant mea at."</i></p>
      <h3>JAMES DOE</h3>
      <h5 class="client-three-tone">Massketing Client</h5>
    </div>
    <!-- /End Client --> 
  </div>
</section>

<!-- =========================
     Section7 - Affiliate   
============================== -->
<section id="affiliate">
  <div class="container reveal-bottom-fade"> 
    <!-- Title -->
    <div class="col-xs-12">
      <h2>GET AFFILIATE WITH US AND FEEL<br>
        THE DIFFERENCE</h2>
      <div class="seprator"></div>
      <p class="padd-both">Omnis commodo consequat ei mea. Movet on ea praesent postulant mea at, at nam dolorem cu lucilius. Praesent postulant mea at, at nam dolorem cu lucilius.</p>
    </div>
    <!-- /End Title --> 
    <!-- Form -->
    <div class=" col-xs-12 col-md-6 col-md-push-3 form-holder"> 
      <!-- Begin Signup Form --> 
      <!-- Newsletter Success -->
      <div id="newsletter-success"><i class="fa fa-envelope" aria-hidden="true"></i> <br>
        Confirmation email sent, Check your Inbox !</div>
      <!-- Newsletter Error -->
      <div id="newsletter-error">
        <ul>
          <li> <i class="fa fa-times" aria-hidden="true"></i><br>
            <label for="email" class="error" id="validation_error"></label>
          </li>
        </ul>
      </div>
      <form id="subscribe" class="cmxform" name="subscribe" method="post" novalidate action="#">
        <div class="form-row">
          <div class="input-wrapper">
            <input type="email" name="subscribe_email" id="email" value="" required class="newsletter-input" placeholder="Email address" />
            <div class="clearfix"></div>
          </div>
          <div class="input-wrapper">
            <input id="submit" type="submit" name="submit" value="Subscribe" class="form-button" data-loading-text="Loading..." />
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>
    <!-- /End Signup Form --> 
  </div>
</section>

<!-- =========================
     Section8 - Footer  
============================== -->
<footer id="copy-right">
  <div class="container">
    <p>© 201 Massketing. Crafted by DeMustang.</p>
  </div>
</footer>

<!-- =========================
     Scripts   
============================== --> 
<!-- Jquery --> 
<script src="assets/js/jquery.min.js"></script> 

<!-- Jquery Easing --> 
<script src="assets/js/jquery.easing.min.js"></script> 

<!-- Bootstrap --> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 

<!-- Validate JS --> 
<script src="assets/js/jquery.validate.min.js"></script> 

<!-- Ajax Form JS --> 
<script src="assets/js/jquery.form.js"></script> 

<!-- Retina Ready --> 
<script src="assets/js/retina.min.js"></script> 

<!-- Background Particles --> 
<script src="assets/js/particles.js"></script> 
<script src="assets/js/particles-config.js"></script> 

<!-- Scroll Reveal --> 
<script src="assets/js/scrollreveal.min.js"></script> 

<!-- Menu Corner Morph --> 
<script src="assets/js/classie.js"></script> 
<script src="assets/js/cornermorph.js"></script> 

<!-- Custom --> 
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from startupwebtech.com/templates/massketing/main/connected-particles-animation/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 03:43:38 GMT -->
</html>
