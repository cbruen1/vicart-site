<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "vic.art@outlook.com";
    // $email_to = "cbruen1@yahoo.com";
    $email_subject = "Website contact";
      
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email'];      // required
    $comments = $_POST['comments'];     // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The Name you entered does not appear to be valid. Please only enter a - z or the space, "-", or "\'" characters.<br />';
    }
    
    if(strlen($comments) < 10) {
      $error_message .= 'The Comment you entered does not appear to be valid. Please enter at least 10 characters.<br />';
    }
    
    if(strlen($error_message) > 0) {
      died($error_message);
    }
    
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers); 
  ?>
   
  <!-- place your own success html below -->
  <!DOCTYPE HTML>
<html>
  <head>
    <title>Vic Art - the art of Victor Bjelakovic showing graphite pencil, charcoal, and oil based works</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Victor Bjelakovic's art portfolio showing his pencil, graphite, oil, and charcoal drawings and artwork. Available for commissions, exhibitions, or one off art pieces." />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.selectorr.min.js"></script>
    <script src="js/jquery.poptrox.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>    
      <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
  </head>
  <body class="no-sidebar">
    <div class="container">

      <!-- Header Wrapper -->
        <div id="header-wrapper" class="wrapper">
              
          <!-- Header -->
            <div id="header">
              
              <!-- Logo -->
                <a href="index.html" id="logo">
                  <span class="pennant"><span class="icon fa-pencil-square"></span></span>
                  <h1>Vic Art</h1>
                </a>

              <!-- Nav -->
                <nav id="nav">
                  <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="commissions.html">Commissions</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="current_page_item"><a href="contact.html">Contact</a></li>
                  </ul>
                </nav>

            </div>

        </div>

      <!-- Footer Wrapper -->
        <div id="footer-wrapper" class="wrapper">

          <!-- Footer -->
            <section id="footer">
              <p>Thank you for contacting me, I'll be in touch with you very soon.</p>
              <ul class="contact">
                <li><a href="mailto:vic-art@outlook.com" class="icon fa-envelope"><span>Email</span></a></li>
                <li><a href="https://www.facebook.com/vic.art.357" class="icon fa-facebook"><span>Facebook</span></a></li>
                <li><a href="https://twitter.com/VicArt556" class="icon fa-twitter"><span>Twitter</span></a></li>
                <!-- <li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li> -->
                <li><a href="http://www.pinterest.com/vicart556/" class="icon fa-pinterest"><span>Pinterest</span></a></li>
                <li><a href="https://plus.google.com/117649432038460181382/" class="icon fa-google-plus" target="_new"><span>Google Plus</span></a></li>
              </ul>
            </section>

          <!-- Copyright -->
            <div id="copyright">
              &copy; Vic Art. All rights reserved.
            </div>

        </div>

    </div>
  </body>
</html>        

  <?php
  }
  die();
?>