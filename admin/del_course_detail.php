<?php
require_once("includes/connection.php");


$id=$_GET['id'];
$sql="DELETE FROM courses_details WHERE course_id='$id'";
$res=mysqli_query($connection,$sql);
if($res)
{
    $_SESSION['errormsg']="data not deleted";
    header("Location:course__detail_list.php");
}



?>