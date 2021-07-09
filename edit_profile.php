<?php
require_once("admin/includes/connection.php");
session_start();
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $semester=$_POST['semester'];
    $degree=$_POST['degree'];
    $cnic=$_POST['cnic'];

    $query1="UPDATE `students` SET `name`='$name',`fname`='$fname',`phone`='$phone',`cnic`='$cnic',`email`='$email',`password`='$password',`semester`='$semester',`degree`='$degree' WHERE s_id='$id'";

     $image=$_FILES['image'];
      $imagename=$image['name'];
  if($imagename!="")
  {
    $id =$_POST['id'];
    $query="SELECT `image` FROM `students` where `s_id`='$id'";
    $res =mysqli_query($connection, $query);
    $oldimage=mysqli_fetch_assoc($res);
    $oldimgname=$oldimage['image'];
    unlink('images/profile/'.$oldimgname);

    move_uploaded_file($image['tmp_name'], 'images/profile/'.$imagename);
    $query1="UPDATE `students` SET `name`='$name',`fname`='$fname',`phone`='$phone',`cnic`='$cnic',`email`='$email',`password`='$password',`semester`='$semester',`degree`='$degree',`image`='$imagename', WHERE s_id='$id'";
   global $connection;
  }

    $result= mysqli_query($connection, $query1);
    if ($result) {
        $_SESSION['successmsg']="Add successfully";
      header("location:index.php");
    } else {
        $_SESSION['errormsg']="data not insert";
        header("Location:edit_profile.php");
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
						<h4 class="text-blue h4 text-center">Student Edit Profile</h4>
					</div>
					<div class="wizard-content">
                    <?php
$id=$_GET['id'];
$sql="SELECT * FROM students WHERE s_id='$id'";
$res=mysqli_query($connection,$sql);
foreach($res as $row)
{
?>

						<form class="tab-wizard wizard-circle wizard" action="" method="POST" enctype="multipart/form-data">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Name :</label>
                                            <input type="hidden" name="id" placeholder="Name" value="<?php echo $row['s_id'] ?>" required>
											<input type="text" name="name" class="form-control" value="<?php echo $row['name']     ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Father Name :</label>
											<input type="text" name="fname" class="form-control" value="<?php echo $row['fname']     ?>">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Contact Number:</label>
											<input type="tel" name="phone" class="form-control" value="<?php echo $row['phone']     ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >CNIC :</label>
											<input name="cnic" type="number" class="form-control" value="<?php echo $row['cnic']   ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email Address :</label>
											<input type="email" name="email" class="form-control" value="<?php echo $row['email']     ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Password :</label>
											<input type="password" name="password" class="form-control" value="<?php echo $row['password']     ?>">
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
											<input type="text" name="degree" class="form-control" value="<?php echo $row['degree']?>">
										</div>
									</div>
								</div>
                                <button class="btn btn-md btn-primary w-25 p-2 f-right" type="submit" name="submit">Submit</button>
							</section>
						
						</form>
					<?php   } ?>
                    
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