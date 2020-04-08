<?php

$host="localhost";
$uname="my_user"; 
$pass="";
$database = " my_db ";

$connection=mysqli_connect($host,$uname,$pass,$database); 

echo mysql_error();

$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 

 $data = mysql_query("SELECT * FROM table_name") 
 or die(mysql_error()); 
 Print "<table border cellpadding=3>"; 
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<tr>Experiment"; 
 Print "<th>ID:</th> <td>".$info['ID'] . "</td> "; 
 Print "<th>Time:</th> <td>".$info['time'] . " </td>";
 Print " <td><a href=Export_Table.php?SubCode=".$info['ID'] .">Export Self</a></td></tr>";
} 
 Print "</table>"; 
mysql_close($connection);
?>
