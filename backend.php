<?php
$con = mysqli_connect('localhost', 'root', '','db');


$Oname = $_POST['Oname'];
$caption = $_POST['caption'];
$url = $_POST['url'];

$sql = "INSERT INTO `meme` (`Name`, `Caption`,`URL`) VALUES ('$Oname','$caption','$url')";
 
$rs = mysqli_query($con, $sql);
if($rs)
{
	header('Location: frontend.php');
}

?>