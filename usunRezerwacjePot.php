<?php

@require_once 'mssql.php';

$kod=$_GET["txtKod"];
$dataOd=$_GET["txtOd"];
$dataDo=$_GET["txtDo"];
 
 
$pizza  = $kod;
$pieces = explode("xy21z", $pizza);

$kod=$pieces[1];

   
     $polecenie_sql=" SELECT [NrPokoju] FROM dbo.Rezerwacja WHERE IdRezerwacji = '$kod ';";
     $zbior_wierszy = mssql_query($polecenie_sql, $polaczenie);
     
     if($zbior_wierszy == NULL)
     print("<p> brak danych o pokoju </p>");
     
      while($wiersz=mssql_fetch_array($zbior_wierszy))
          {
           $NrPokoju = $wiersz["NrPokoju"];
           }
           
           
     $polecenie_sql2=" SELECT IdPokoju FROM dbo.Pokoj WHERE [NrPokoju] = '$NrPokoju';";
     $zbior_wierszy2 = mssql_query($polecenie_sql2, $polaczenie);
     
     if($zbior_wierszy2 == NULL)
     print("<p> brak danych o pokoju </p>");
     
      while($wiersz=mssql_fetch_array($zbior_wierszy2))
          {
           $IdPokoju = $wiersz["IdPokoju"];
           }


 $polecenie_sql3="delete from Rezerwacja where IdRezerwacji='$kod';";
 

      $zbior_wierszy3 = mssql_query($polecenie_sql3, $polaczenie);
      
      $polecenie_sql3="delete FROM dbo.Grafik WHERE IdPokoju = '$IdPokoju' AND DataOd='$dataOd' and DataDo='$dataDo';";
 

      $zbior_wierszy3 = mssql_query($polecenie_sql3, $polaczenie);
      
      echo "Anulowano rezerwacje";



?>