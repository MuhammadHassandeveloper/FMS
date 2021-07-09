<?php
session_start();
require_once("admin/includes/connection.php");
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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Student Paid Challan</h4>

        <!----------------------- success msg ---------------------------->
        <?php
                    if (isset($_SESSION['successmsg'])) {
                        ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="clos" data-dismiss="alert" aria-label="Close">
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
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>reg_fee</th>
									<th>sem_fee</th>
									<th>payment_id</th>
									<th>total</th>
									<th>date</th>
									<th>fee status</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
$id=$_SESSION['student_id'];
$sql="SELECT * FROM `challans` WHERE s_id='$id'";
$res=mysqli_query($connection,$sql);
foreach($res as $row)
{
?>
								<tr>
									<td class="table-plus"><?php   echo $row['name']   ?></td>
									<td><?php   echo $row['reg_fee']   ?></td>
									<td><?php   echo $row['sem_fee']   ?> </td>
									<td><?php   echo $row['payment_id']   ?></td>
									<td><?php   echo $row['total']   ?></td>
									<td><?php   echo $row['date']   ?></td>

									<td><?php
                                        if($row['fee_verified']==1){ ?>
                                        <?php   echo "paid"  ?>
                                    <?php }    else{    ?>
                                        <?php     echo "not paid" ?>
                             <?php        } ?>
                                    </td> 
									<td>
											</div>
										</div>
									</td>
								</tr>

								<?php  } ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				 Bootstrap 4 Admin Template By  Admin Dashboard
			</div>
		</div>
	</div>













	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>