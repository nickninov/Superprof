<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Samira</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="images/images/yoga.png">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    

    <link rel="stylesheet" href="css/style.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



	<!-- Smooth scroll -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	});
	</script>

	<!-- Style -->
	<style type="text/css">

	/* Initial text focus in animation */
	.text-focus-in {
		-webkit-animation: text-focus-in 2s ease-in-out 1s both;
		        animation: text-focus-in 2s ease-in-out 1s both;
	}

	@-webkit-keyframes text-focus-in {
	  0% {
	    -webkit-filter: blur(12px);
	            filter: blur(12px);
	    opacity: 0;
	  }
	  100% {
	    -webkit-filter: blur(0px);
	            filter: blur(0px);
	    opacity: 1;
	  }
	}
	@keyframes text-focus-in {
	  0% {
	    -webkit-filter: blur(12px);
	            filter: blur(12px);
	    opacity: 0;
	  }
	  100% {
	    -webkit-filter: blur(0px);
	            filter: blur(0px);
	    opacity: 1;
	  }
	}

	/* Telephone animation */
	.vibrate-1 {
		-webkit-animation: vibrate-1 1s linear infinite both;
		        animation: vibrate-1 1s linear infinite both;
	}

	@-webkit-keyframes vibrate-1 {
	  0% {
	    -webkit-transform: translate(0);
	            transform: translate(0);
	  }
	  20% {
	    -webkit-transform: translate(-2px, 2px);
	            transform: translate(-2px, 2px);
	  }
	  40% {
	    -webkit-transform: translate(-2px, -2px);
	            transform: translate(-2px, -2px);
	  }
	  60% {
	    -webkit-transform: translate(2px, 2px);
	            transform: translate(2px, 2px);
	  }
	  80% {
	    -webkit-transform: translate(2px, -2px);
	            transform: translate(2px, -2px);
	  }
	  100% {
	    -webkit-transform: translate(0);
	            transform: translate(0);
	  }
	}
	@keyframes vibrate-1 {
	  0% {
	    -webkit-transform: translate(0);
	            transform: translate(0);
	  }
	  20% {
	    -webkit-transform: translate(-2px, 2px);
	            transform: translate(-2px, 2px);
	  }
	  40% {
	    -webkit-transform: translate(-2px, -2px);
	            transform: translate(-2px, -2px);
	  }
	  60% {
	    -webkit-transform: translate(2px, 2px);
	            transform: translate(2px, 2px);
	  }
	  80% {
	    -webkit-transform: translate(2px, -2px);
	            transform: translate(2px, -2px);
	  }
	  100% {
	    -webkit-transform: translate(0);
	            transform: translate(0);
	  }
	}

	</style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      <div class="site-navbar-top">
        <div class="container py-3">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="d-flex mr-auto">
                <a href="#" class="d-flex align-items-center mr-4">
                  <span class="icon-envelope mr-2"></span>
                  <span class="d-none d-md-inline-block">arimas8smira@gmail.com</span>
                </a>
                  <span class="icon-phone mr-2 vibrate-1" style="color: white"></span>
                  <span class="d-none d-md-inline-block" style="color: white">+44 784 140 9704</span>
              </div>
            </div>
            <div class="col-6 text-right">
              <div class="mr-auto">
                <a href="http://twitter.com/" target="_blank" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.facebook.com/" target="_blank" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://www.instagram.com/" target="_blank" class="p-2 pl-0"><span class="icon-instagram"></span></a>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-2">
              <h1 class="my-0 site-logo"><a href="index.html">Samira</a></h1>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
                    <li><a href="#home-section" class="nav-link">Home</a></li>
                    <li><a href="#classes-section" class="nav-link">Classes</a></li>
                    
                    <li><a href="#about-section" class="nav-link">About</a></li>
                    <li><a href="#events-section" class="nav-link">Events</a></li>
                    <li><a href="#gallery-section" class="nav-link">Gallery</a></li>
                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-blocks-cover overlay" style="background-image: url(images/images/yoga-2176668_1920.jpg);" data-aos="fade" data-stellar-background-ratio="0.5"id="home-section">
      <div class="container">
        <div class="row align-items-center text-center justify-content-center">
          <div class="col-md-8 text-focus-in">
           
            <h1 class="font-weight-bold ">Samira Manassib</h1>
            <p class="sub-text mb-4 d-block">Welcome to my yoga classes</p>
             <a data-fancybox data-ratio="2" href="https://www.youtube.com/watch?v=Z8In0I1WHFs" class="d-inline-flex align-items-center">
              <span class="play-button d-block mr-3">
                <span class="icon-play"></span>
              </span>
              <span class="text-white">Watch the video</span>
            </a>
          </div>
        </div>
      </div>
    </div>  

    
    <section class="site-section" id="classes-section">

      <div class="clearfix mb-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-7 text-left heading-wrap">
              <h2 class="mt-0" data-aos="fade-up" data-aos-delay="150" data-aos-easing="ease-in-out">Services</h2>
            </div>
            <div class="col-md-5 align-self-center text-md-right" data-aos = "zoom-in-down" data-aos-delay="230" data-aos-easing="ease-in-out">
              <a href="#" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)" class="btn btn-primary customPrevBtn">Previous</a>

              <a href="#"  style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)" class="btn btn-primary customNextBtn">Next</a>
            </div>
          </div>
        </div>
      </div>

      <div class="owl-carousel centernonloop">
        <div class="item-class" data-aos = "fade-up-right" data-aos-delay="250" data-aos-easing="ease-in-out">
          <div class="text">
            <p class="class-price">£29.99</p>
            <h2 class="class-heading">Well being coaching</h2>
          </div>
          <img src="images/doyoga_img_1.jpg" alt="" class="img-fluid">
        </div>

        <div class="item-class" data-aos = "fade-up-right" data-aos-delay="250" data-aos-easing="ease-in-out">
          <div class="text">
            <p class="class-price">£32.99</p>
            <h2 class="class-heading">Reiki</h2>
          </div>
          <img src="images/images/precious-1432335_1920.jpg" alt="Stones" class="img-fluid">
        </div>

        <div class="item-class" data-aos = "fade-up-right" data-aos-delay="250" data-aos-easing="ease-in-out">
          <div class="text">
            <p class="class-price">£42.00</p>
            <h2 class="class-heading">Chandra Vinyasa</h2>
          </div>
          <img src="images/images/yoga-3053488_1920.jpg" alt="Woman meditating" class="img-fluid">
        </div>

        <div class="item-class" data-aos = "fade-up-right" data-aos-delay="250" data-aos-easing="ease-in-out">
          <div class="text">
            <p class="class-price">£69.99</p>
            <h2 class="class-heading">Intuitive healing body work massage</h2>
          </div>
          <img src="images/images/spa-3184610_1920.jpg" alt="Woman getting a massage" class="img-fluid">
        </div>

      </div>
    </section> <!-- .section -->

    <section class="site-section" id="schedule-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-7 text-left heading-wrap mb-5" data-aos="zoom-in-right">
              <h2 class="mt-0">Classes</h2>
              
            </div>
            
          </div>
        </div>

        <div class="container-fluid">

          <div class="row no-gutters">
            <div class="col-md-6">
              <div class="sched d-block d-lg-flex" data-aos="fade-up" data-aos-delay="250">
                <div class="bg-image order-2" style="background-image: url('images/images/464ce6_d222f639408c4930880882a3f3832ee4_mv2.jpg');"></div>
                <div class="text order-1">
                  <h3>Yinyasa</h3>
                  <p style="text-align: justify;">This class is a hybrid of yang (active yoga) with yin (passive yoga). We will begin with 30 minutes of gentle yoga to build strength, warmth and flow with fundamental yoga postures while relieving stress and tension by connecting breath with mindful movements.</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> 5:30 PM</span> <br>
                    <span><span class="fa fa-calendar"></span> February 22, 2020</span> <br>
                  </p>
                  <p class="btn btn-primary btn-sm" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Join for £15</p>
                  
                </div>
                
              </div>

              <div class="sched d-block d-lg-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-image" style="background-image: url('images/images/hjorthmedh-viva-vinyasa-6.jpg');"></div>
                <div class="text">
                  <h3>Chandra Vinyasa</h3>
                  <p style="text-align: justify;">The focus is inherently part of the process by following carefully the rhythm of inhale and exhale during the sequence of poses, breath is thus a sort of “harness” which links the mind to the body.</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> 4:30 PM</span> <br>
                    <span><span class="fa fa-calendar"></span> February 29, 2020</span> <br>
                  </p>
                  <p class="btn btn-primary btn-sm" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Join for £10</p>
                  
                </div>
                
              </div>

            </div>

            <div class="col-md-6">
              <div class="sched d-block d-lg-flex" data-aos="fade-up" data-aos-delay="350">
                <div class="bg-image order-2" style="background-image: url('images/images/maxresdefault.jpg');"></div>
                <div class="text order-1">
                  <h3>Surya Vinyasa</h3>
                  <p style="text-align: justify;">Surya Namaskara embodies completely the very essence of what we seek to achieve through the practice of yoga because it initiates and cultivates the internal journey towards our ‘Inner Sun’. As such it is a complete practice in itself and could alone be used by the practitioner of yoga to master the art of asana.</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> 6:30 PM</span> <br>
                    <span><span class="fa fa-calendar"></span> March 1, 2020</span> <br>
                  </p>
                  <p class="btn btn-primary btn-sm" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Join from £20</p>
                  
                </div>
                
              </div>

              <div class="sched d-block d-lg-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-image" style="background-image: url('images/images/511c05dc950362c8e3f9c906080280d1-rimg-w720-h479-gmir.jpg');"></div>
                <div class="text">
                  <h3>Ashtanga Foundations</h3>
                  <p style="text-align: justify;">Yoga’s benefits affect each person in a different way. Many find that it helps them to relax; others find themselves feeling healthier and more energetic. All the systems in the body-from the lymphatic to the digestive to the cardiovascular-benefit from yoga. Yoga benefits every aspect of our bodies, inside and out..</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> 8:00 PM</span> <br>
                    <span><span class="fa fa-calendar"></span> June 25, 2020</span> <br>
                  </p>
                  <p class="btn btn-primary btn-sm" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Join from £30</p>
                  
                </div>
                
              </div>

            </div>
          </div>
        </div>
      
      </div>
    </section> <!-- .section -->

    <section class="site-section" id="about-section" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="text-left heading-wrap mb-5">
              <h2 class="mt-0 mb-5">About us</h2>
                              <p style="text-align: justify;">Samira has been a qualified therapist for 10 years having worked in various children, young people and family services settings initially and now in the holistic field of mental, physical and psychological healing - using various modalities.</p>

<p style="text-align: justify;">She is a very experienced Massage practitioner, Certified EFT (Emotional Freedom Technique) Practitioner, Reiki Practitioner and recently qualified Well Being/ Life Coach.</p>

<p style="text-align: justify;">She has an enormous passion in all she undertakes with clients various needs that see her. Samira’s greatest skills are her healing energy work - intuitive and very knowledgeable in all areas of wellbeing for the mind, body and spirit - all can be tailor made to suit the needs of the person at any moment in time - no two sessions are ever the same it always depends on the needs and feelings of the client on the day.</p>
            </div>
          </div>
          <div class="col-md-6 position-relative align-self-center">
            <img src="images/images/IMG_0796.JPG" alt="Image" class="img-overlap-1" style="border-radius: 50%">
          </div>
        </div>
      </div>
    </section>

<div style="text-align: center;"><h2 class="mt-0 mb-5" style="font-size: 3em" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000" id="team">Meet our team</h2></div>
    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1300">

            <img src="images/images/vv29g5pqjwfnaf9et8i6.webp" class="img-fluid mb-4">

            <h3>Napoleon Dynamite</h3>
			<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sapien eget mi proin sed libero. Aenean et tortor at risus. Egestas integer eget aliquet nibh praesent tristique magna. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Varius sit amet mattis vulputate.</p>
          </div>

          <div class="col-md-6 mb-5" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1300">
            <img src="images/images/80847712_1519462431525239_2961167457085030400_n.jpg"class="img-fluid mb-4">

            <h3>Nikolay Ninov</h3>
			<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sapien eget mi proin sed libero. Aenean et tortor at risus. Egestas integer eget aliquet nibh praesent tristique magna. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Varius sit amet mattis vulputate.</p>
          </div>
        </div>

      </div>
    </section>


    <section class="site-section" id="events-section">
      <div class="container">

        <div class="row">
          <div class="col-12 heading-wrap text-left mb-5">
            <h2 class="mb-5" data-aos="fade-in-up" data-aos-delay="100" data-aos-duration="1200">Events</h2>
          </div>
        

          <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="500">
            <div class="blog d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('images/images/31164183_2501118460112528_8867431754684694528_o.jpg');"></div>
              <div class="text">
                <h3>Yoga with Cynthia</h3>
                <p class="sched-time">
                  <span><span class="fa fa-calendar"></span> September 20, 2020</span> <br>
                </p>
                <p>West Acton community centre</p>
              </div>
              
            </div>
          </div>

          <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="1500">
            <div class="blog d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('images/images/80718287_2889248721093426_6545376571073495040_o.jpg');"></div>
              <div class="text">
                <h3>Taster Class</h3>
                <p class="sched-time">
                  <span><span class="fa fa-calendar"></span> February 16, 2020</span> <br>
                </p>
                <p style="text-align: justify;">Try one of our classes for free!</p>
              </div>
              
            </div>
          </div>
        
        </div>
      </div>
    </section>

    <section class="site-section" id="gallery-section" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
      <div class="container">

        <div class="row">
          <div class="col-12 heading-wrap text-center mb-5">
            <h2 class="mb-5">Yoga Gallery</h2>
          </div>
        </div>

        <div class="row justify-content-center mb-5" data-aos="fade">
          <div id="filters" class="filters text-center button-group col-md-7">
            <button class="btn btn-primary active" data-filter="*" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">All</button>

            <button class="btn btn-primary" data-filter=".web" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Classes</button>

            <button class="btn btn-primary" data-filter=".design" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Intern</button>

            <button class="btn btn-primary" data-filter=".brand" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1)">Training</button>
          </div>
        </div>  

        <div id="posts" class="row no-gutter">
          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="images/images/plank.png" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/images/plank.png">
            </a>
          </div>
          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="images/images/yoga.jpg" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/images/yoga.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="images/images/42b71de13e424c169b6cc375d63b45dc.png" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/images/42b71de13e424c169b6cc375d63b45dc.png">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">

            <a href="images/images/yoga-for-everyone_promo-superJumbo.jpg" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/images/yoga-for-everyone_promo-superJumbo.jpg">
            </a>

          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="images/doyoga_about_2.jpg" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/doyoga_about_2.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="images/doyoga_about_3.jpg" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/doyoga_about_3.jpg">
            </a>
          </div>



        </div>
      </div>
    </section> 

    <section class="site-section element-animate" id="contact-section" data-aos="fade-right" data-aos-delay="100" data-aos-duration="500">
      <div class="mb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Get In Touch</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <form action="./PHP/send.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <?php 
	              if (isset($_SESSION['errorName'])) {
	              	echo "<p style = \"color: red;\">{$_SESSION['errorName']}</p>";
	              }
	               ?>
                  <input type="text" id="name" name="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <?php 
	              if (isset($_SESSION['errorPhone'])) {
	              	echo "<p style = \"color: red;\">{$_SESSION['errorPhone']}</p>";
	              }
	               ?>
                  <input type="text" id="phone" name="phone" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <?php 
	              if (isset($_SESSION['errorEmail'])) {
	              	echo "<p style = \"color: red;\">{$_SESSION['errorEmail']}</p>";
	              }
	               ?>
                  <input type="email" id="email" name="email" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <?php 
	              if (isset($_SESSION['errorMessages'])) {
	              	echo "<p style = \"color: red;\">{$_SESSION['errorMessages']}</p>";
	              }
	               ?>
                  <textarea name="msg" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary" style="background-color: rgba(0, 177, 106, 1); border-color: rgba(0, 177, 106, 1">
                </div>
              </div>

	          <?php 
		          if (isset($_SESSION['message'])) {
		              	echo "<p style = \"color: rgba(0, 177, 106, 1);\">{$_SESSION['message']}</p>";
	              }
               ?>
            </form>
          </div>
          
          <div class="col-lg-6 pl-2 pl-lg-5">

            <div class="col-md-8 mx-auto contact-form-contact-info">
              <h4 class="mb-5">Contact Details</h4>
                <p class="d-flex">
                  <span class="ion-ios-location icon mr-5"></span>
                  <span>18 Willesden Ln, Kilburn, London NW6 7SR</span>
                </p>

                <p class="d-flex">
                  <span class="ion-ios-telephone icon mr-5"></span>
                  <span>+44 784 140 9704</span>
                </p>

                <p class="d-flex">
                  <span class="ion-android-mail icon mr-5"></span>
                  <span>arimas8smira@gmail.com</span>
                </p>
              </div>

          </div>
        </div>
      </div>

    </section>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-12">
                <h3 class="footer-heading mb-4">About Samira</h3>
                <p style="text-align: justify;">She has been a qualified therapist for 10 years having worked in various children, young people and family services settings initially and now in the holistic field of mental, physical and psychological healing - using various modalities.</p>
              </div>
            </div>
            

            
          </div>
          <div class="col-lg-4">
           
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quck Links</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#home-section">Home</a></li>
                  <li><a href="#gallery-section">Gallery</a></li>
                  <li><a href="#events-section">Events</a></li>
                  <li><a href="#team">Team</a></li>
                </ul>
              </div>
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">



            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="https://www.facebook.com/" target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="http://twitter.com/" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="https://www.instagram.com/" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </div>
              </div>
            </div>


          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/main.js"></script>
     

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
  </body>
</html>