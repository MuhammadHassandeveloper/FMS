<?php
require_once("includes/connection.php");
session_start();
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="UPDATE  admin SET name='$name',email='$email',password='$password' WHERE admin_id='$id'";
global $connection;
$results=mysqli_query($connection,$sql);
if($results){ 
 header("Location: index.php");
    
} else {
 echo "Not Edit";
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

	<div class="mobile-menu-overlay"></div>

	<div class="main-container col-md-6" style="margin-left:200px;">
		<div class="">
			<div class="min-height-300px">
				<div class="pd-20 card-box mb-30">
					 <h3 class="p-3">Edit Profile</h3>
					<div class="wizard-content">
                    <?php
$id=$_GET['id'];
$sql="SELECT * FROM admin WHERE admin_id='$id'";
$res=mysqli_query($connection,$sql);
foreach($res as $row)
{
?>


						<form class="tab-wizard" action="" method="POST">
							<section class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
                                    <input type="hidden" name="id" placeholder="Name" value="<?php echo $row['admin_id'] ?>" required>

											<label >Name :</label>
											<input type="text" name="name"  value="<?php echo $row['name'] ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label >Email :</label>
											<input type="email" name="email"   value="<?php echo $row['email'] ?>" class="form-control">
										</div>
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
											<label >Password :</label>
											<input type="password" name="password"  value="<?php echo $row['password'] ?>" class="form-control">
										</div>
									</div>
								</div>
							<button class="btn btn-md btn-primary w-100" type="submit" name="submit">Submit</button>
							
							</section>
						</form>


                        <?php } ?>
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