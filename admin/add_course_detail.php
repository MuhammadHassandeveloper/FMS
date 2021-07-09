<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
  header("Location:login.php");
}
?>
<?php
require_once("includes/connection.php");
if (isset($_POST['submit'])) {
    $course=$_POST['course'];
    $subjects=str_replace(",",",",$_POST['subjects']);
    $reg_fee=$_POST['reg_fee'];
    $sem_fee=$_POST['sem_fee'];
    $semester=$_POST['semester'];
     $file=$_FILES['file'];
$filename=$file['name'];
if($course==""||$reg_fee==""||$sem_fee==""||$semester==""||$filename=="")
{
   $_SESSION['errormsg']="All Fields Are Required";
  header("Location:add_course_detail.php");
} else{
move_uploaded_file($file['tmp_name'], 'files/'.$filename);
   $query1="INSERT INTO `courses_details`(`course`, `subjects`, `reg_fee`, `sem_fee`, `semester`, `file`) VALUES ('$course','$subjects','$reg_fee','$sem_fee','$semester','$filename')";
    global $connection;
    $result= mysqli_query($connection, $query1);
    if ($result) {
        $_SESSION['successmsg']="Add successfully";
    header("location:course__detail_list.php");
    } else {
        $_SESSION['errormsg']="data not insert";
        header("Location:add_course_detail.php");
    }
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/files/apple-touch-icon.png">
	<link rel="icon" type="file/png" sizes="32x32" href="vendors/files/favicon-32x32.png">
	<link rel="icon" type="file/png" sizes="16x16" href="vendors/files/favicon-16x16.png">

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
					 <h3 class="p-3">Add Course</h3>
					    <!----------------------- success msg ---------------------------->
						<?php
                    if (isset($_SESSION['successmsg'])) {
                        ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
            </div><!-- d-flex -->
        </div><!-- alert -->

        <?php
                             unset($_SESSION['successmsg']);
                    }
                   ?>




				   
        <!----------------------- errormsg ---------------------------->
        <?php
                    if (isset($_SESSION['errormsg'])) {
                        ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <strong>Alert!</strong> <?php echo $_SESSION['errormsg']; ?>
            </div><!-- d-flex -->
        </div><!-- alert -->

        <?php
                             unset($_SESSION['errormsg']);
                    }
                   ?>
					<div class="wizard-content">
						<form class="tab-wizard" action="" method="POST" enctype="multipart/form-data">
							<section class="col-md-12">
								<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label>Select Course :</label>
											<select name="course" id="" class="form-control">
														 <?php 
														  $sql="SELECT * FROM courses";
														  $res=mysqli_query($connection,$sql);
														  foreach($res as $row1)
														  {
														 ?>
														 <option value=" <?php  echo $row1['cours_id']   ?>" class="form-control">
                                                          <?php  echo $row1['course_name']   ?>
														 </option>
														 <?php } ?>
													 </select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label >Subjects</label>
											<input type="text" name="subjects"   class="form-control" multiple>
										</div>
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
											<label >Registration Fee :</label>
											<input type="number" name="reg_fee"   class="form-control">
										</div>
									</div>


                                    <div class="col-md-12">
										<div class="form-group">
											<label >Semester Fee:</label>
											<input type="number" name="sem_fee"   class="form-control">
										</div>
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
											<label>Select Semester :</label>
											<select class="custom-select form-control" name="semester">
												<option value="1st Semester">1st Semester</option>
												<option value="2nd Semester">2nd Semester</option>
												<option value="3rd Semester">3rd Semester</option>
												<option value="4th Semester">4th Semester</option>
												<option value="5th Semester">5th Semester</option>
												<option value="6th Semester">6th Semester</option>
												<option value="7th Semester">7th Semester</option>
												<option value="8th Semester">8th Semester</option>
											
											</select>
										</div>
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
											<label >Prospects Upload:</label>
											<input type="file" name="file"   class="form-control">
										</div>
									</div>
								</div>
							<button class="btn btn-md btn-primary w-100" type="submit" name="submit">Submit</button>
							
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