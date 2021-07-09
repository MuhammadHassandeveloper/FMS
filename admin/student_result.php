<?php
session_start();
require_once("includes/connection.php");

if(isset($_POST['result']))
{
$sid=$_GET['id'];
$resultid=$_POST['result_id'];

$sql="SELECT result_id FROM `student_results` WHERE s_id='$sid'";
$res=mysqli_query($connection,$sql);
$row=mysqli_num_rows($res);
if($row>0)
{
$_SESSION['errormsg']="u already assign this result to this student";	
header("Location:student_list.php");
}
else{
    $sid=$_GET['id'];
$resultid=$_POST['result_id'];
 $sql="INSERT INTO `student_results`(`s_id`,`result_id`) VALUES ('$sid','$resultid')";
$res=mysqli_query($connection,$sql);
if($res)
{
	$_SESSION['successmsg']="Successfully Assign";
    header("Location:student_list.php");

}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
<?php
require_once("includes/header.php");
?>
<?php
require_once("includes/sidebar.php");
?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container col-md-8" style="margin-left:120px;">
		<div class="">
			<div class="min-height-300px">
				<div class="pd-20 card-box mb-30">
					 <h3 class="p-3">Add Result and Attendance</h3>
	
					<div class="wizard-content">
						<form class="tab-wizard" action="" method="POST">
							<section class="col-md-12">
								<div class="row">
									<div class="col-md-12">
                                    <br> <br>
                                    <select name="result_id" id="" class="form-control">
														 <?php 
														  $sql="SELECT * FROM results_attendance";
														  $res=mysqli_query($connection,$sql);
														  foreach($res as $row1)
														  {
														 ?>
														 <option value=" <?php  echo $row1['r_id']   ?>" class="form-control">
                                                          <?php  echo $row1['cgpa']   ?>
														 </option>
														 <?php } ?>
													 </select>
                                                        <br> 
														<br>

														<select name="result_id" id="" class="form-control">
														 <?php 
														  $sql="SELECT * FROM results_attendance";
														  $res=mysqli_query($connection,$sql);
														  foreach($res as $row1)
														  {
														 ?>
														 <option value=" <?php  echo $row1['r_id']   ?>" class="form-control">
                                                          <?php  echo $row1['attendance']   ?>
														 </option>
														 <?php } ?>
													 </select>
													 <br> <br>

	</div>
                                  
								</div>
							<button class="btn btn-md btn-primary w-100" type="submit" name="result">Submit</button>
							
							</section>
						</form>
					</div>
</div>
				</div>

		
			</div>
		
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>
</html>

