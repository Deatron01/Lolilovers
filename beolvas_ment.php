<?php
$varos = 'Budapest,hu';
idojaras('Budapest,hu');
idojaras('Gyor,hu');
idojaras('Miskolc,hu');
idojaras('Debrecen,hu');

function idojaras($varos){
    $cp=fopen("http://api.openweathermap.org/data/2.5/weather?q=".$varos."&units=metric&lang=hu&appid=cb9d90cacab0b7302686aab85a55f78b","r");
    
    $adatok = fread($cp,1024);
    $adatdekod=json_decode($adatok);
    $hofok=$adatdekod->main->temp;
    $para=$adatdekod->main->humidity;
    $szel=$adatdekod->wind->speed;
    $szel=$szel*3.6;
    $szelirany=$adatdekod->wind->deg;
    $ido = date('Y-m-d');

    require("kapcs.inc.php");
    
    $query = "INSERT INTO idoj (varos, datum, hofok, para, szel, szelirany)
    VALUES ('$varos','$ido','$hofok','$para','$szel','$szelirany'); ";
    mysqli_query($con,$query);
    
    print("Város: ".$varos."<br>");
    print("Hőfok:".$hofok."°C<br>");
    print("Pára: ".$para."<br>");
    print("Dátum: ".$ido."<br>");
    print("Szél: ".$szel."<br>");
    print("Szélirány: ". $szelirany."<br>");
}
?>