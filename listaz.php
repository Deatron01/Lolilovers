<?php
require("kapcs.inc.php");
$query = "SELECT varos, datum, hofok, para, szel, szelirany FROM idoj";
$result = mysqli_query($con,$query);
print("<h1>Listázva</h1>");
while($row = mysqli_fetch_assoc($result)) {
    echo "Város: ".$row['varos']."<br>".
    "Dátum: ".$row['datum']."<br>".
    "Hőfok: ".$row['hofok']."<br>".
    "Pára: ".$row['para']."<br>".
    "Szél: ".$row['szel']."<br>".
    "Szélirány: ".$row['szelirany']."<br><br>";
}
?>