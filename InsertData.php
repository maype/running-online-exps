<?php
$database="databasename";
$host="hostadress";
$user="user";
$password="password";

$db = new mysqli($host, $user, $password, $database);
if (mysqli_connect_errno()) {
   printf("DB error: %s", mysqli_connect_error());
   exit();
}
//for security reasons we remove slashes from the inputs
$ID = stripslashes(htmlspecialchars($_POST[‘ID]));
$DATA = stripslashes(htmlspecialchars($_POST[‘DataToSend’]));

$stmt = $db->prepare("INSERT INTO table_name VALUE(?,?,NOW())");//I also insert the time
$stmt->bind_param("si", $ID,$DATA );//s=string, i=integer
$stmt->execute();
$err = $stmt->errno ;
$data[] = array(
      'ErrorNo' => $err,
    );
$stmt->close();
 $db->close();
echo json_encode($data);
 ?>
