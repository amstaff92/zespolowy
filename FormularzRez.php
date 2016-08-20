<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<title>Rezerwacje hotelowe-HotelMat-Kalisz</title>
		<meta name="keywords" content="hotel, rezerwacja, goście" />
		<meta name="description" content="HotelMat to możliwość zarezerwowania miejsca noclegowego w Kaliszu" />
		<meta name="author" content="Mateusz Sobczak" />
		
		<link rel="Stylesheet" href="P17_P1_styl.css" type="text/css" />
			 <script type="application/javascript" src="js/skrypt.js"></script>
		
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
	<?php
@require_once 'mssql.php';


//_____________________________________________________________________________
	
	print("	
 <div id='srodek'>			
	<article id='tresc'>");
	
			$NrPokoju=$_GET[NrPokoju];
					
			$Data=$_GET["Data"];
			
			$DataOd=$_GET["DataOd"];
			
			$DataDo=$_GET["DataDo"];
			
			
/*-------------------------------------------------------------------------------------		*/		
						$DATA = date('z',strtotime($DataOd)) ;
				$DATA+=1;
				$DATA2 = date('z',strtotime($DataDo)) ;
				$DATA2+=1;
				$IloscDob=$DATA2-$DATA;
/*------------------------------------------------------------------------------------*/
					$polecenie_sql="SELECT NrPokoju,IloscLozek, PokojStandard, Cena FROM dbo.Pokoj WHERE   NrPokoju=$NrPokoju ;";
					
										
					$zbior_wierszy = mssql_query($polecenie_sql, $polaczenie);
					
					
					if($zbior_wierszy == NULL){
					print("<p> brak danych o salach </p>");
					die();
					}
					
					
					
					print("<table>
									<thead>
										<tr>
											<td>Numer Pokoju</td>
											<td>IloscLozek</td>
											<td>Standard</td>
											<td>Cena Łączna</td>
											
											
											
											</tr>
										</thead>
										<tbody>
										
										
										");
										
									
											
										while($wiersz=mssql_fetch_array($zbior_wierszy))
										{
											$NrPokoju = $wiersz["NrPokoju"];
											$IloscLozek = $wiersz["IloscLozek"];
											$Standard = $wiersz["PokojStandard"];
											$Cena = $wiersz["Cena"];
										
												
										if($Standard == 1)
										{
											$Standard='Standard';
											}
											else if($Standard == 2)
											{
												$Standard='Studio';
											}
											
											else {
											$Standard='Apartament';}
										
									$Cena*=	$IloscDob;
																			
											print("<tr>
											<td>$NrPokoju</td>
												<td>$IloscLozek</td>
													<td>$Standard</td>
											<td>$Cena PLN</td>
											
											
											
											</tr>");
										}
										
										
										
										print("</tbody>
														</table>");
//________________________________________________________________________________
	
Print("
	<figure>
<figcaption> Nowa rezerwacja </figcaption>
</figure>
<div id='formularz'>

<form id='frmRezerwacja' method='get' action='Podsumowanie.php' >

<fieldset>
<legend>Dane osobowe</legend>
<p>
<label for='txtImie'> Imię <em>*</em></label>
		<input id='txtImie' type='text' name='txtImie' autofocus='autofocus' required='required' pattern='[A-ZŁŚ]{1}[a-ząęółśżźćń]{1,20}' title='Wprowadź imię'/><br>
		</p><p>
		<label for='txtNazwisko'> Nazwisko <em>*</em></label>
		<input id='txtNazwisko' type='text' name='txtNazwisko' required='required' pattern='^[A-ZŁŚ]{1}[a-ząęółśżźćń]{1,20}' title='Wprowadź nazwisko'/><br>
		</p><p>
		<label for='telNumer'> Numer telefonu </label>
		<input id='telNumer' type='tel' name='telNumer' title='Wprowadź numer bez spacji' size='12' maxlength='9' placeholder= '000000000' required='required' pattern='[0-9]{9}'/><br>
		</p>
		<p>
<label for='emailAdres'>Adres e-mail</label>
<input id='emailAdres' name='emailAdres' type='email' maxlength='30' placeholder='adres@hosting.pl' required='required' pattern='[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}' />
</p>
<p>
<label for='miejscowosc'>Miejscowosc</label>
<input id='miejscowosc' name='miejscowosc' type='text' maxlength='30' required='required' pattern='[A-ZŁŚ]{1}[a-ząęółśżźćń]{1,20}' />
</p>
<p>
<label for='ulica'>Ulica</label>
<input id='ulica' name='ulica' type='text' maxlength='30' required='required' pattern='[A-ZŁŚ]{1}[a-ząęółśżźćń]{1,30}[\s][0-9]{1,3}' title='Wprowadź ulicę z nr domu, np. Aaaaa 11'/>
</p>
<p>
<label for='nrMieszkania'>Numer mieszkania</label>
<input id='nrMieszkania' name='nrMieszkania' type='text' maxlength='30' pattern='[0-9]{1,2}' />
</p>
<p>
<label for='kodPocztowy'>Kod Pocztowy</label>
<input id='kodPocztowy' name='kodPocztowy' type='text' maxlength='30' required='required' pattern='[0-9]{2}[\-]?[0-9]{3}' Title='Wprowadź kod pocztowy' />
</p>
<p>
<label for='kraj'>Kraj</label>
<input id='kraj' name='kraj' type='text' maxlength='30' required='required' pattern='[A-ZŁŚ]{1}[a-ząęółśżźćń]{1,20}' />
</p>



<p>
<label for='NrPokoju'></label>
<input id='NrPokoju' name='NrPokoju' type='hidden' maxlength='30' value='$NrPokoju' required='required' />
</p>
<p>
<label for='IloscLozek'></label>
<input id='IloscLozek' name='IloscLozek' type='hidden' maxlength='30' value='$IloscLozek' required='required' />
</p>
<p>
<label for='DataOd'></label>
<input id='DataOd' name='DataOd' type='hidden' maxlength='30' value='$DataOd' required='required' />
</p>
<p>
<label for='DataDo'></label>
<input id='DataDo' name='DataDo' type='hidden' maxlength='30' value='$DataDo' required='required' />
</p>

<p>
<label for='Data'></label>
<input id='Data' name='Data' type='hidden' maxlength='30' value='$Data' required='required' />
</p>

<p>
<label for='Cena'></label>
<input id='Cena' name='Cena' type='hidden' maxlength='30' value='$Cena' required='required' />
</p>
</fieldset>


<input type='submit' value='Dodaj rezerwacje'/>
<input type='reset' value='Wyczysc dane' />

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

