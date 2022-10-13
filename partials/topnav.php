<header  class="main-header">
	<a href="<?php echo BASE_URL; ?>" class="logo" style="background-color:green;" >
		<span class="logo-mini"><b>UE</>NR</span>
		<span class="logo-lg"><b>UENR</b> Payroll</span>
	</a>
	<nav style="background-color:green;" class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu" >
			<ul class="nav navbar-nav" >
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
							<img src="<?php echo BASE_URL; ?>dist/img/imageedit_2_9223538341.png" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $userData['admin_name']; ?></span>
						<?php } else { ?>
							<img src="<?php echo REG_URL; ?>photos/<?php echo $userData['photo']; ?>" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $userData['first_name']; ?> <?php echo $userData['last_name']; ?></span>
						<?php } ?>
					</a>
					<ul class="dropdown-menu" style="background-color:green;">
						<li class="user-header" style="background-color:green;">
							<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
								<img src="<?php echo BASE_URL; ?>dist/img/imageedit_2_9223538341.png" class="img-circle" alt="User Image">
							<?php } else { ?>
								<img src="<?php echo REG_URL; ?>photos/<?php echo $userData['photo']; ?>" class="img-circle" alt="User Image">
							<?php } ?>
							<p>
								<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
									UENR ADMINISTRATION
								<?php } else { ?>
									Employee
								<?php } ?>
								<small>UENR PAYROLL SYSTEM</small>
							</p>
						</li>
						
						<li class="user-footer" style="background-color:green;">
							<div class="pull-left">
								<a href="<?php echo BASE_URL; ?>profile/" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo BASE_URL; ?>logout/" class="btn btn-default btn-flat">Logout</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>