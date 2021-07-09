<?php
session_start();
?>
<?php
require_once("admin/includes/connection.php");
require_once("payment/jazz.php");
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

	<div class="main-container col-md-12">
		<div class="">
			<div class="min-height-300px">
				<div class="pd-20 card-box mb-30">
					 <h3 class="p-3">Challan Form</h3>
					<div class="wizard-content">
					
<?php
$id=$_SESSION['student_id'];
$sql="SELECT id FROM student_courses WHERE s_id='$id'";
$res =mysqli_query($connection,$sql);
$row=mysqli_num_rows($res);
if($row==0)
{  ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert:</strong> Yet Admin Not Assign u Course Please Wait.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } else {

?>



<?php  
$id=$_SESSION['student_id'];
$sql = "SELECT semester FROM students WHERE s_id=$id";
$res = mysqli_query($connection,$sql);
$row=mysqli_num_rows($res);
if($row>0)
{
	$array=mysqli_fetch_assoc($res);
	$semester=$array['semester'];
}
$sql="SELECT courses.*,courses_details.*,student_courses.* FROM ((courses INNER JOIN courses_details ON courses.cours_id=courses_details.course)INNER JOIN student_courses ON courses.cours_id=student_courses.cours_id) WHERE s_id='$id' AND semester='$semester'";
$res = mysqli_query($connection,$sql);
foreach($res as $row)
{

?>
<?php } ?>

						<form class="tab-wizard" action="" method="POST" id="challan" enctype="multipart/form-data">

                        <?php 
                           $id = $_SESSION['student_id'];
                            $sql = "SELECT * FROM students WHERE s_id=$id";
                            $res = mysqli_query($connection,$sql);
                            foreach($res as $data)
                            {
                        
                        ?>
							<section class="col-md-12">
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label > Student Name</label>
											<input type="text"  id="name"   name="name" value="<?php echo $data['name']?>"  class="form-control" readonly>
											<input type="hidden"  id="s_id"   name="name" value="<?php echo $data['s_id']?>"  class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Father Name</label>
											<input type="text" name="fname" id="fname" value="<?php echo $data['fname']?>"  class="form-control" readonly>
										</div>
									</div>
                                                          </div>



                                                          <div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label >Phone No</label>
											<input type="text" name="phone" id="phone" value="<?php echo $data['phone']?>"   class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Student Semester</label>
											<input type="text" name="semester" id="semester" value="<?php echo $data['semester']?>"   class="form-control" readonly>
										</div>
									</div>
                                                          </div>
                                                          <div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label >Degree</label> 
											<input type="text" name="degree" id="degree" value="<?php echo $data['degree']?>"  class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Courses</label>
											<input  id="course"  value="<?php echo $row['course_name'] ?>" type="text" name="course_name"   class="form-control" readonly>
										</div>
									</div>
                                                          </div>




                                                          <div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label >Subjects</label>
											<input  id="subjects" value="<?php echo $row['subjects'] ?>" type="text" name="subjects"   class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Registration Fee</label>
											<input id="reg_fee" value="<?php echo $row['reg_fee'] ?>" type="text" name="reg_fee"   class="form-control" readonly>
										</div>
									</div>
                                                          </div>

                                                          <div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label >Semester Fee</label>
											<input id="sem_fee" value="<?php echo $row['sem_fee'] ?>" type="text" name="sem_fee"   class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Semester</label>
											<input value="<?php echo $row['semester'] ?>" type="text" name="semester"   class="form-control" readonly>
										</div>
									</div>
                                    
                            </div>
							<div class="rwo">
							 <a class="btn btn-md btn-warning" href="admin/files/<?php echo $row['file'] ?>">Download Prospectus</a>
							</div>
                            
                            <div class="row w-50" style="float:right;">
                            <div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label >Phone Number</label>
											<input id="jazzphone" type="tel" name="phone"   class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >cnic</label>
											<input  id="jazzcnic" type="tel" name="cnic" value="345678" class="form-control" required>
										</div>
									</div>
                                    
                            </div>

                                   <div class="col-md-12">
                                       <div class="bg-info">
                                      <p class="p-5 text-light">
                                          Total Fee:
                                          <strong>
                                          <?php 
                                          
                                      $val1=$row['sem_fee'];
                                      $val2=$row['reg_fee'];
                                      $total=$val1+$val2;
                                      echo $total;
                                          ?>
                                          </strong>
                                      </p>
                                      <input id="total" value="<?php echo $total ?>" type="hidden" name="total"   class="form-control" readonly>
                                       </div>
                                   </div>
                                   
                               </div>



                               


								</div>
							<button class="btn btn-md btn-primary w-100" type="submit" name="submit">Submit</button>
							  
							</section>
                            <?php } ?>
						</form>
						<?php   } ?>
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
	<script>
	
	$("#challan").submit(function(e){
    e.preventDefault();
    formData={
        name:$("#name").val(),
        fname:$("#fname").val(),
        semester:$("#semester").val(),
		degree:$("#degree").val(),
        s_id:$("#s_id").val(),
        course:$("#course").val(),
        subjects:$("#subjects").val(),
		regFee:$("#reg_fee").val(),
        semFee:$("#sem_fee").val(),
        total:$("#total").val(),
    jazzPhone:$("#jazzphone").val(),
    jazzCnic:$("#jazzcnic").val(),
    }
console.log(formData);
    $.post('api/jazzcash.php',formData,function(data){
		console.log(data);
       data=JSON.parse(data);
           alert(data.message);
		   window.location.href="index.php";
        
    });
});
	
	</script>
</body>
</html>