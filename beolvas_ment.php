<?php
 $varos = "Budapest,hu";
 $cp=fopen("http://api.openweathermap.org/data/2.5/weather?q=".$varos."&units=metric&lang=hu&appid=cb9d90cacab0b7302686aab85a55f78b","r");
 $adatok =fread($cp,1024);
 $adat_decod=json_decode($adatok);
 $hofok=$adat_decod->main->temp;
 $datum = date("Y-m-d");
 $para = $adat_decod->main->humidity;
 $szel = $adat_decod->wind->speed;
 $szel = $szel*3.6;
 $szelirany = $adat_decod->wind->deg;
 require("kapcs.inc.php");

 $sql = "INSERT INTO idoj( varos , datum , hőfok , para , szel , szelirany ) values ('$varos' ,'$datum' ,'$hofok' ,'$para', '$szel','$szelirany')";
 
 if(mysqli_query($con,$sql) == TRUE)
 {
     print("bevitted az adatot");
 }

 print("Waro$: ".$varos);
 print("<br>");
 print($hofok." °C");
 print($datum);
 print($szel);
 print($szelirany);
 
 
 
 ?>