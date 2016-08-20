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
	<?php
	@require_once 'mssql.php';
	
print("	
 <div id='srodek'>			
	<article id='tresc'>");
	
			
			$NrPokoju=$_GET[NrPokoju];
			//$Standard=$_GET[Standard];
			
				$DataOd=$_GET["DataOd"];
				
			
			
			$DataDo=$_GET["DataDo"];
			
				$DATA = date('z',strtotime($DataOd)) ;
				$DATA+=1;
				$DATA2 = date('z',strtotime($DataDo)) ;
				$DATA2+=1;
				
//print("Dzisiaj jest ".$DATA . " dzien w roku </br>");
//print("Data wyjazdu to ".$DATA2 . " </br>");


$IloscDob=$DATA2-$DATA;

				

					$polecenie_sql="SELECT NrPokoju,IloscLozek, PokojStandard, Cena FROM dbo.Pokoj WHERE   NrPokoju=$NrPokoju ;";
					
					//WHERE  IloscLozek=@Par_IloscLozek AND Standard=@Par_Standard AND Status=@Par_Status
					
					$zbior_wierszy = mssql_query($polecenie_sql, $polaczenie);
					
					
					if($zbior_wierszy == NULL)
					print("<p> brak danych o salach </p>");
					

									
											
										while($wiersz=mssql_fetch_array($zbior_wierszy))
										{
												$Imie=$_GET['txtImie'];
											$Nazwisko=$_GET['txtNazwisko'];
											$NrTelefonu=$_GET['telNumer'];
											$Email=$_GET['emailAdres'];
											$Miejscowosc=$_GET['miejscowosc'];
											$Ulica=$_GET['ulica'];
											$NrMieszkania=$_GET['nrMieszkania'];
											$KodPocztowy=$_GET['kodPocztowy'];
											$Kraj=$_GET['kraj'];
											
											$NrPokoju = $wiersz["NrPokoju"];
											$IloscLozek = $wiersz["IloscLozek"];
											$Standard = $wiersz["PokojStandard"];
											$Cena = $wiersz["Cena"];
										
										$Cena*=$IloscDob;
												
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
										
									}
/*________________________________________________________________________________*/


	
Print("


	<figure>

</figure>
<div id='frmPodsumowanie'>

<form id='frmRezerwacja' method='get' action='PotwierdzRez.php' >

<fieldset>
<legend><strong>Podsumowanie</strong></legend>
<p>
<label for='txtImie'> Imię <em>*</em></label>
		<input id='txtImie' type='text'readonly name='txtImie' class='frmPodsum' value='$Imie' autofocus='autofocus' required='required'/><br>
		</p><p>
		<label for='txtNazwisko'> Nazwisko <em>*</em></label>
		<input id='txtNazwisko' type='text'class='frmPodsum' readonly name='txtNazwisko' value='$Nazwisko' required='required'/><br>
		</p><p>
		<label for='telNumer'> Numer telefonu </label>
		<input id='telNumer' type='tel' readonly name='telNumer'value='$NrTelefonu' title='Wprowadź numer bez spacji' size='12' maxlength='9' placeholder= '000000000' class='frmPodsum' required='required'/><br>
		</p>
		<p>
<label for='emailAdres'>Adres e-mail</label>
<input id='emailAdres' name='emailAdres'  class='frmPodsum' type='email'readonly value='$Email' maxlength='30' placeholder='adres@hosting.pl' required='required' />
</p>
<p>
<label for='miejscowosc'>Miejscowosc</label>
<input id='miejscowosc' name='miejscowosc' class='frmPodsum' value='$Miejscowosc' type='text' readonly maxlength='30' required='required' />
</p>
<p>
<label for='ulica'>Ulica</label>
<input id='ulica' name='ulica' type='text' class='frmPodsum' readonly value='$Ulica' maxlength='30' required='required' />
</p>
<p>
<label for='nrMieszkania'>Numer mieszkania</label>
<input id='nrMieszkania' name='nrMieszkania' class='frmPodsum' value='$NrMieszkania' type='text' readonly maxlength='30' required='required' />
</p>
<p>
<label for='kodPocztowy'>Kod Pocztowy</label>
<input id='kodPocztowy' name='kodPocztowy' class='frmPodsum' value='$KodPocztowy' type='text' readonly maxlength='30' required='required' />
</p>
<p>
<label for='kraj'>Kraj</label>
<input id='kraj' name='kraj' value='$Kraj' type='text' class='frmPodsum' readonly maxlength='30' required='required' />
</p>

<p>
<label for='NrPokoju'>Numer Pokoju</label>
<input id='NrPokoju' name='NrPokoju' type='text' class='frmPodsum' readonly maxlength='30' value='$NrPokoju' required='required' />
</p>
<p>
<label for='IloscLozek'>Ilość Osób</label>
<input id='IloscLozek' name='IloscLozek' type='text' class='frmPodsum' readonly maxlength='30' value='$IloscLozek' required='required' />
</p>
<p>
<label for='standard'>Standard</label>
<input id='standard' name='standard' type='text' class='frmPodsum' readonly maxlength='30' value='$Standard' required='required' />
</p>



<p>
<label for='Cena'>Cena łączna</label>
<input id='Cena' name='Cena' type='text' class='frmPodsum' maxlength='30' value='$Cena' readonly />
</p>
 
<p>
<label for='IloscDni'>Ilosc dób</label>
<input id='IloscDni' name='IloscDni' type='text' class='frmPodsum' readonly maxlength='30' value='$IloscDob'  />
</p>

<p>
<label for='txtOd'>Data przyjazdu</label>
<input id='txtOd' name='txtOd' type='date' class='frmPodsum' readonly value='$DataOd' required='required'/>
</p>

<p>
<label for='txtDo'>Data odjazdu</label>
<input id='txtDo' name='txtDo' type='date' class='frmPodsum' readonly value='$DataDo' required='required' />
</p>
</fieldset>


<input type='submit' value='Potwierdz rezerwacje'/>
<input type='button' id='anuluj' onClick=location.href='index.php' value='Anuluj'/>

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

