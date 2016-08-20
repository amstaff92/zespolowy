<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<title>Rezerwacje hotelowe-HotelMat-Kalisz</title>
		<meta name="keywords" content="hotel, rezerwacja, goście" />
		<meta name="description" content="HotelMat to możliwość zarezerwowania miejsca noclegowego w Kaliszu" />
		<meta name="author" content="Mateusz Sobczak" />
			
		
					
		<link rel="Stylesheet" href="P17_P1_styl.css" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="application/javascript" src="js/skrypt.js"></script>
	<script src="js/jquery.chained.js"></script>
	</head>

	
	<body >
		
		
	
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
	
	<script>
	
		$(function(){
		
				$("#ilosc").chained("#rodzaj");
		
		});
	
	</script>
	
	
	<?php

	$DATA = date ("Y-m-d") ;
	//Print('Data dzisiaj: '.$DATA);
	
	$dzien=date("Y-m-d",strtotime("+1 day"));
	
		
	//	print("dzien: "	.$dzien);
	
	
	
print("	
 <div id='srodek'>			
	<article id='tresc'>
	<figure>
<figcaption> Nowa rezerwacja </figcaption>
</figure>
<div id='formularz'>





	
	<div id='przerwa'> </div>
	

<form id='frmSprawdz' method='get' action='WolnePokoje.php'  onsubmit='return SprawdzDate()' >

<fieldset>
<legend>Znajdź pokój</legend>


<p>
<label for='txtPokoj'>Rodzaj pokoju*</label>
<select name='rodzaj' id='rodzaj'>
		<option value='1'>Standard</option>
		<option value = '2'>Studio</option>
		<option value= '3'>Apartament</option>
	</select>
</p>


<p>
<label for='txtOd'>Data przyjazdu*</label>
<input id='txtOd' name='txtOd' min='$DATA' type='date' required='required' placeholder='rrrr-mm-dd' />
</p>


<p>
<label for='txtDo'>Data odjazdu*</label>
<input id='txtDo' name='txtDo' min='$dzien' type='date' required='required' placeholder='rrrr-mm-dd'  />
</p>

<p>
<label for='txtLiczba_osob'>Liczba osób*</label>
<select name='ilosc' id='ilosc'>
			<option value='1' class='1'>1</option>
		<option value = '2' class='1 2 3' >2</option>
		<option value= '3' class='1'>3</option>
		<option value= '4' class='1 2 3'>4</option>
	</select>

</p>
<p>
<input class='antyspam' type='text' name='email' />
</p>



</fieldset>


<input type='submit' value='Sprawdz dostepnosc' />
<input type='reset' value='Wyczysc dane'  />



</form>
</div>



");


?>



	</article>
	

	<aside id="dodatkowa">
	<h2>Oferta specjalna</h2>
	<p>Zarezerwuj pobyt do końca czerwca a otrzymasz 10% rabatu</p>
	</aside>
		</div>
	<footer id="stopka">
	 <p>Copyright &copy; 2015 HotelMat Sobczak, Kucharski, Nowakowski &nbsp;All Rights Reserved. </p>
	</footer>
		</body>


</html>

