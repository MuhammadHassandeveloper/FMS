<?php
require_once("includes/connection.php");


$id=$_GET['id'];
$sql="DELETE FROM results_attendance WHERE r_id='$id'";
$res=mysqli_query($connection,$sql);
if($res)
{
    $_SESSION['errormsg']="data not deleted";
    header("Location:result_list.php");
}
?>