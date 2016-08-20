<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<title>Rezerwacje hotelowe-HotelMat-Kalisz</title>
		<meta name="keywords" content="hotel, rezerwacja, goście" />
		<meta name="description" content="HotelMat to możliwość zarezerwowania miejsca noclegowego w Kaliszu" />
		<meta name="author" content="Mateusz Sobczak" />
		
		<link rel="Stylesheet" href="P17_P1_styl.css" type="text/css" />
	</head>
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
	
			<div id='srodek'>			
	<article id='tresc'> 
		
	
<?php
		
		
		if(isset($_GET) AND ! empty($_GET["email"]) )

	die("Blokada antyspamowa. Przesłanie formularza nie powiodło się. Jeśli uważasz to za błąd - poinformuj nas na adres contact@hotel.com");



	
			$dataPocz=$_GET["txtOd"];
			$iloscDob=$_GET["txtDo"];
			Print('Data rezwacji: <br/> od: '.' '.$dataPocz.''.'&nbsp do:  '.$iloscDob.' <br/>');
			
					
			//____________________________________________________________________________
				@require_once 'mssql.php';
						
			
											$Status = 1;
											
											$liczbaOs = $_GET["ilosc"];
											$DataOd = $_GET["txtOd"];
											$DataDo = $_GET["txtDo"];
											$RodzajPok = $_GET["rodzaj"];
											
							
											 $podzial = explode("-", $DataOd);
    list( $rok, $miesiac, $dzien) = $podzial; //podzial daty na rok miesiac dzien
							
			$DATA = date('z',strtotime($DataOd)) ;
				$DATA+=1;
				$DATA2 = date('z',strtotime($DataDo)) ;
				$DATA2+=1;


$IloscDob=$DATA2-$DATA;

Print("Ilość dób: &nbsp".$IloscDob. "</br> &nbsp ");

	
	$polecenie_sql="execute dbo.PokojeDostepnosc '$DataOd', '$DataDo' , '$liczbaOs','$RodzajPok'; ;";

										

					$zbior_wierszy = mssql_query($polecenie_sql, $polaczenie);
					
					
					if($zbior_wierszy == NULL)
					print("<p> brak danych o salach </p>");
					
					
					
					
					print("<table>
									<thead>
										<tr>
											<td>Numer Pokoju</td>
											<td>Cena za dobe</td>
										
											<td></td>
											
											
											</tr>
										</thead>
										<tbody>
										
										
										");
										
										
										while($wiersz=mssql_fetch_array($zbior_wierszy))
										{
											$NrPokoju = $wiersz["NrPokoju"];
											$Cena = $wiersz["Cena"];
											
												
																											
											print("<tr>
											<td>$NrPokoju</td>
											<td>$Cena PLN</td>
											
											<td><input type='button' onClick=location.href='FormularzRez.php?NrPokoju=$NrPokoju&DataOd=$DataOd&DataDo=$DataDo' value='Rezerwuj'/></td>
											
											</tr>");
										}
										
										
										
										print("</tbody>
														</table>");

			if($NrPokoju == null || $Cena==null)
												print("<p> Obecnie nie mamy wolnych pokoi tego typu </p>");
					
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
