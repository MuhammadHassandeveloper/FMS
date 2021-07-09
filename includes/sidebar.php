
	<div class="left-side-bar">
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
						<a href="index.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					<li class="dropdown">

					
					<?php
					$id=$_SESSION['student_id'];
					$sql="SELECT s_id FROM `challans`  WHERE fee_verified=1 AND s_id='$id'";
					$res =mysqli_query($connection,$sql);
					$row=mysqli_num_rows($res);
					if($row==0)
					{  ?>
							 
						<a href="student_challan.php" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Pay Challan</span>
						</a>

						<?php }  else {  ?>

							<a href="view_challan.php" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">View Challan</span>
						</a>
						<?php   } ?>

						<ul class="submenu">
							<!-- <li><a href="basic-table.html">All Students</a></li> -->
							<!-- <li><a href="datatable.html">DataTables</a></li> -->
						</ul>
					</li>

					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">View Result</span>
						</a>
					</li>
					<li class="dropdown">

					<?php
					$id=$_SESSION['student_id'];
					$sql="SELECT s_id FROM `fine_challans`  WHERE fine_verified=1 AND s_id='$id'";
					$res =mysqli_query($connection,$sql);
					$row=mysqli_num_rows($res);
					if($row==0)
					{  ?>
						<a href="student_fine.php" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Pay Fines</span>
						</a>
				<?php } else{ ?>
					<a href="view_fine.php" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">View Fines</span>
						</a>
				<?php } ?>
			
				</li>

					 <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-copy"></span><span class="mtext">Admin Help</span>
						</a>
						<ul class="submenu">
							<li><a href="send_message.php">Send Message</a></li>
							<li><a href="view_message.php">View Replies</a></li>
						</ul>
					</li> 
                    <li>
						<a href="calendar.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>