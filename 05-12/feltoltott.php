<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
header("Location: belepes.php");
} 
?>
<!DOCTYPE html>
<!--Author: B. Ferenc: ekekapa@gmail.com-->
<!--csunya az egesz, de gyorsan kellett+?-->
<!--nem paraméterezett SQL...-->
<html>
<title>Bartók Zsófia exemplumadatbázis feltöltés</title>
<meta charset="utf-8"> 
</head>
<body>
<?php
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);
$query="SELECT * FROM ".$tabla;
$result = mysqli_query($sqlkapcsolat,$query);

echo "<table BORDER=1><tr>";
for($i = 0; $i < $sqlkapcsolat->field_count; $i++) {
    $field_info = $result->fetch_field();
    echo "<th>{$field_info->name}</th>";
}

// Print the data
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $_column) {
        echo "<td>{$_column}</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>
</body>
</html>