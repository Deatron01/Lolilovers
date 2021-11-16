<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require_once("kapcs.inc.php"); 
$sql="SELECT * FROM idoj";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)) 
{
    echo "id: " . $row["id"]. " - Varos: " . $row["varos"]. "  Datum: " . $row["datum"]. "  hőfok: " . $row["hőfok"]. " para: " . $row["para"]. " szel: " . $row["szel"]." szelirany: " . $row["szelirany"]. "<br>";
}
?>
    
</body>
</html>