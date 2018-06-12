<?php

$connection = mysqli_connect("localhost", "root", "", "osh");

mysqli_set_charset($connection,'utf8');


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php
$a=$_GET['id'];
	 
	mysqli_query($connection, "UPDATE spisok SET number1=number1+1 WHERE id =".$a);
 	mysqli_affected_rows($connection);

 $result = mysqli_query($connection, "SELECT * FROM spisok WHERE id=".$a);
	$row = mysqli_fetch_row($result);

?>
<span type="button" class="btn btn-light">Я пойду</span>
<?php
if($row[9]==1){
	echo '<b>Вы идете на мероприятие </b>';
}
else{
	echo '<b> Уже идут '.$row[9].' человека</b>';
}
?>
</body>
</html>