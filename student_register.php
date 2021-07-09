<?php
require_once("admin/includes/connection.php");
session_start();
if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $semester=$_POST['semester'];
    $degree=$_POST['degree'];
    $cnic=$_POST['cnic'];
     $image=$_FILES['image'];
$imagename=$image['name'];
if($name==""||$fname==""||$email==""||$phone==""||$imagename==""||$semester==""||$degree=="")
{
   $_SESSION['errormsg']="All Fields Are Required";
  header("Location:student_register.php");
} else{
move_uploaded_file($image['tmp_name'], 'images/profile/'.$imagename);
  $query1="INSERT INTO `students`(`name`, `fname`, `phone`, `cnic`, `email`, `password`, `semester`, `degree`, `image`) VALUES ('$name','$fname','$phone','$cnic','$email','$password','$semester','$degree','$imagename')";
    global $connection;
    $result= mysqli_query($connection, $query1);
    if ($result) {
        $_SESSION['successmsg']="Add successfully";
      header("location:student_login.php");
    } else {
        $_SESSION['errormsg']="data not insert";
        header("Location:student_register.php");
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
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
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


	<div class="main-container  w-75 ml-5">
		<div>
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4 text-center">Student Registeration</h4>
										   
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
					
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" action="" method="POST" enctype="multipart/form-data">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Name :</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Father Name :</label>
											<input type="text" name="fname" class="form-control">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Contact Number:</label>
											<input type="tel" name="phone" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >CNIC :</label>
											<input name="cnic" type="number" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email Address :</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Password :</label>
											<input type="password" name="password" class="form-control">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Choose  Profile:</label>
											<input type="file" name="image" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
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
									<div class="col-md-6">
										<div class="form-group">
											<label >Degree</label>
											<input type="text" name="degree" class="form-control">
										</div>
									</div>
								</div>
                                <button class="btn btn-md btn-primary w-25 p-2 f-right" type="submit" name="submit">Submit</button>
							
							</section>
						
						</form>
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