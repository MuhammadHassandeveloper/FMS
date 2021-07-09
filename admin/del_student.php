<?php
session_start();
require_once("includes/connection.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];

$sql="DELETE FROM  students WHERE s_id='$id'"; 
$res=mysqli_query($connection,$sql);
 if($res)
{
	$_SESSION['success']="Successfully changed";
	header("Location:student_list.php");	
	}
}
?>