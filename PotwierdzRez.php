<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<title>Rezerwacje hotelowe-HotelMat-Kalisz</title>
		<meta name="keywords" content="hotel, rezerwacja, goscie" />
		<meta name="description" content="HotelMat to moĹźliwoĹÄ zarezerwowania miejsca noclegowego w Kaliszu" />
		<meta name="author" content="Mateusz Sobczak" />
		<meta http-equiv="refresh" content="2; URL=http://localhost/PZ/index.php">
		  <script src="js/bjqs-1.3.min.js"></script>
		<link rel="Stylesheet" href="P17_P1_styl.css" type="text/css" />
			<script type="application/javascript" src="js/skrypt.js"></script>
	</head>
	
	<body > <!--onLoad="cofanie()"-->
	
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
	
		
			
											$Imie = $_GET["txtImie"];
											$Nazwisko = $_GET["txtNazwisko"];
											$NrTelefonu = $_GET["telNumer"];
											$Email = $_GET["emailAdres"];
											$Miejscowosc = $_GET["miejscowosc"];
											$Ulica = $_GET["ulica"];
											$NrMieszkania = $_GET["nrMieszkania"];
											$KodPocztowy = $_GET["kodPocztowy"];
											$Kraj = $_GET["kraj"];
											
											
											$NrPokoju = $_GET["NrPokoju"];
											$IloscLozek = $_GET["IloscLozek"];
											$standard = $_GET["standard"];
											$DataOd=$_GET["txtOd"];
											$DataDo=$_GET["txtDo"];
											$Data=$_GET["Data"];
											$Cena = $_GET["Cena"];
											
											
													$DATA = date('z',strtotime($DataOd)) ;
				$DATA+=1;
				$DATA2 = date('z',strtotime($DataDo)) ;
				$DATA2+=1;
				$IloscDob=$DATA2-$DATA;
					//	$Cena*=	$IloscDob;
				$polecenie_sql="set xact_abort on
Declare @test int
Declare @id int
begin transaction
set @test = (select count(IdKlienta) from Klient where Imie='$Imie' and Nazwisko='$Nazwisko' and NrMieszkania = '$NrMieszkania' and Ulica = '$Ulica' and Miejscowosc = '$Miejscowosc')
if( @test> 0) 
begin
INSERT INTO dbo.Rezerwacja VALUES( (SELECT IdKlienta from dbo.Klient WHERE (Imie='$Imie' AND Nazwisko='$Nazwisko' AND NrMieszkania='$NrMieszkania')),  '$NrPokoju',  '$IloscLozek', '$DataOd', '$DataDo','$Cena', '1' );
INSERT INTO  dbo.Grafik VALUES((SELECT IdPokoju from dbo.Pokoj WHERE NrPokoju='$NrPokoju'),'$DataOd', '$DataDo');
print 'nie dodalem klienta'
end
else
begin
INSERT INTO dbo.Klient VALUES ('$Imie', '$Nazwisko', '$NrTelefonu', 	'$Email', '$Miejscowosc', '$Ulica', '$NrMieszkania' , '$KodPocztowy', '$Kraj');
INSERT INTO dbo.Rezerwacja VALUES( (SELECT IdKlienta from dbo.Klient WHERE (Imie='$Imie' AND Nazwisko='$Nazwisko' AND NrMieszkania='$NrMieszkania')),  '$NrPokoju',  '$IloscLozek', '$DataOd', '$DataDo','$Cena', '1' );
INSERT INTO  dbo.Grafik VALUES((SELECT IdPokoju from dbo.Pokoj WHERE NrPokoju='$NrPokoju'),'$DataOd', '$DataDo');
print 'dodalem tez klienta'
end

commit transaction;";
	
					
						$zbior_wierszy = mssql_query($polecenie_sql, $polaczenie);
						
						$idRezerwacji = mssql_query("select IdRezerwacji from Rezerwacja where NrPokoju = '$NrPokoju' and IloscOsob = '$IloscLozek' and DataOd = '$DataOd'",$polaczenie);
						$wiersz=mssql_fetch_array($idRezerwacji);
						$wynik=$wiersz["IdRezerwacji"];
						
												
										
									
						$random=rand(10000,99999);
						$liczba="xy21z";
						
						$wynikk="$random$liczba$wynik";
						
						
						    mail($Email,'HotelMat',
        ' Rezerwacja pokoju nr: '.$NrPokoju.
        ' na nazwsko: '.$Nazwisko.' '.$Imie.
        ' kod rezewacji to : '.$wynikk.
        ' rezewacja od: '.$DataOd. ' rezewacja do: '.$DataDo.
        ' aby anulować rezewacje wykorzystaj link: http://localhost/PZ/usunRezerwacjePot.php?txtKod='.$wynikk.'&txtOd='.$DataOd.'&txtDo='.$DataDo,
        'From: test.xampp.local@gmail.com');
			
Print("<p>Dodanie rezewacji do bazy przebiegło pomyślnie </br> Zaraz nastąpi przekierowanie na strone główną</p>");




?>
	</article>
	<aside id="dodatkowa">
	<h2>Oferta specjalna</h2>
	<p>Zarezerwuj pobyt do koĹca czerwca a otrzymasz 10% rabatu</p>
	</aside>
		</div>
	<footer id="stopka">
	 <p>Copyright &copy; 2015 HotelMat Sobczak, Kucharski, Nowakowski &nbsp;All Rights Reserved. </p>
	</footer>
		</body>


</html>

