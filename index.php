<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<title>Rezerwacje hotelowe-HotelMat-Kalisz</title>
		<meta name="keywords" content="hotel, rezerwacja, goście" />
		<meta name="description" content="HotelMat to możliwość zarezerwowania miejsca noclegowego w Kaliszu" />
		<meta name="author" content="Sobczak, Nowakowski, Kucharski" />
		
		<link rel="Stylesheet" href="P17_P1_styl.css" type="text/css" />
		<link rel="stylesheet" href="demo.css">

		
			 <!-- bjqs.css contains the *essential* css needed for the slider to work -->
    <link rel="stylesheet" href="bjqs.css">

    <!-- some pretty fonts for this demo page - not required for the slider -->
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'/> 

    <!-- demo.css contains additional styles used to set up this demo page - not required for the slider --> 
    <link rel="stylesheet" href="demo.css">
		 <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
	</head>
    <!-- load jQuery and the plugin -->
   
		
	
	<body>
	<header id="header">

		<h2 class="napis">HotelMat</h2>

		
	
	</header>
<nav id="menu">
		<ul class="menu">
		<li><a href="index.php">HOME</a></li>
		<li><a href="ZnajdzWolnyPokoj.php">REZERWACJA</a></li>
		<li><a href="kontakt.php">KONTAKT</a></li>
			<li><a href="pokoje.php">POKOJE</a></li>
		</ul>
	
	</nav>
	<!--<div id="srodek">			
	<article id="tresc">-->
	
  <div id="container">
	

      <h2 class="napis2">Dost�pne pokoje</h2>

      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-slide">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><a href="pokoje.php"><img src="img/pokoj-standard-1.jpg" title="Standard"></a></li>
          <li><a href="pokoje.php"><img src="img/pokoj_studio-1.jpg" title="Studio"></a></li>
          <li><a href="pokoje.php"><img src="img/pokoj-apartament-1.jpg" title="Apartament"></a></li>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->
      
      <!-- attach the plug-in to the slider parent element and adjust the settings as required -->
      <script class="secret-source">
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 420,
            width         : 620,
            responsive    : true,
            randomstart   : true
          });
          
        });
      </script>

    </div>

    

		</div>
		
	<footer id="stopka">
	 <p>Copyright &copy; 2015 HotelMat Sobczak, Kucharski, Nowakowski &nbsp;All Rights Reserved. </p>
	</footer>
		</body>
</html>


