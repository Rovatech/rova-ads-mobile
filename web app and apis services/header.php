<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="#">
				<img src="assets/img/logo.png" alt="logo" style="width: 56px;" />
				<strong>Picky</strong> Eater</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
				<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "*"){ ?>
					<a href="admin_dashboard.php">
						Dashboard
					</a>
					<?php }else if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "**"){ ?>
					<a href="dashboard.php">
						Dashboard
					</a>
					<?php } ?>
					
				</li>
			</ul>
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
			
			<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "**"){ ?>
				<!-- Notifications -->
				<li class="dropdown" id="notificationCount">
					
			  </li>
			  
			  <?php } ?>

				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!-- 						<img alt="" src="assets/img/logo1.png" width="16px" height="16px" /> -->
					<?php if(!empty($_SESSION['user_image'])){
					?>
							<i><img alt="" src="images/<?=$_SESSION['user_name']; ?>/<?=$_SESSION['user_image']; ?>" width="16px" height="16px" /></i>
					<?php 
					}else{
					?>
						<i class="icon-male"></i>
					<?php 
					}?>
						<span class="username"><?php echo $_SESSION['user_name']; ?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
						<li class="divider"></li>
						<li><a href="action/logout.php"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->

		
	</header> <!-- /.header -->