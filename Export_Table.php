<?php
$host="localhost";
$uname="my_user";
$pass="abcd1234";
$database = " my_db ";

$connection=mysql_connect($host,$uname,$pass,$database); 

echo mysql_error();

$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 

$Subject = $_GET['SubCode'];
$result = mysql_query("SELECT  * FROM table_name WHERE ID= '$Subject' ");
$pasajeros = '';

if ($result) {
    while ($row = mysql_fetch_array($result)) {
        $pasajeros .= $row["DATA"] . ",".$row["Time"] ."\r\n"; //note the comma here
    }
}
$filename = "pasajeros_" . date("Y-m-d_H-i"); 
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header("Content-disposition: filename=ExperimentName-" . $Subject . ".csv");
mysql_close($connection);
echo $pasajeros;
exit();
?>
