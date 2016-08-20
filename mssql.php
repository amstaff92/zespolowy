<?php
$serwer = "KOMP-PRZENOSNY\ADMINMSSQL,62445"  ;
			$baza = " zesp" ;
			$konto = "zesp";
			$haslo = "zesp";
		$polaczenie=mssql_connect($serwer,$konto,$haslo);
if($polaczenie==null)
die("<p>polaczenie z serwerem nie powiodlo siê</p>");
$wynik=mssql_select_db($baza,$polaczenie);

if(wynik==null)
die("<p>polaczenie z baz± nie powiodlo siê</p>");
?>