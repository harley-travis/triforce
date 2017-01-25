<header>
	<div class="container-fluid logo-header">
		<div class="col-md-2">
			<div class="white-logo">
				<h1><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard">White July</a></h1>
			</div><!-- logo -->
		</div>
		<div class="col-md-10 col-xs-12 header-nav">
			<nav>		
				<ul class="nav nav-pills">
					<li role="presentation" class="active dropdown nav-wj">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"> UserName <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>Edit Profile</li>
							<li>Settings</li>
							<li><a href="<?php echo D_ROOT; ?>/model/logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div><!-- header-nav -->
	</div><!-- logo-header -->
</header>
<div class="container-fluid content-wrapper">
	<div class="row">
		<div class="col-md-2 col-xs-12 left-col">
			<nav class="dashboard-side-nav">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard"><span class="glyphicon glyphicon-home dashboard-icon" aria-hidden="true"></span> Dashboard</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=reports"><span class="glyphicon glyphicon-stats dashboard-icon" aria-hidden="true"></span> Reports</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=orders"><span class="glyphicon glyphicon-shopping-cart dashboard-icon" aria-hidden="true"></span> Orders</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=job-status"><span class="glyphicon glyphicon-tasks dashboard-icon" aria-hidden="true"></span> Job Status</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=products"><span class="glyphicon glyphicon-tag dashboard-icon" aria-hidden="true"></span> Products</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=users"><span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> Users</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=store-locations"><span class="glyphicon glyphicon-globe dashboard-icon" aria-hidden="true"></span> Store Locations</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=feedback"><span class="glyphicon glyphicon-comment dashboard-icon" aria-hidden="true"></span> Feedback</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=server-status"><span class="glyphicon glyphicon-cloud dashboard-icon" aria-hidden="true"></span> Server Status</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/model/logout.php"><span class="glyphicon glyphicon-log-out dashboard-icon" aria-hidden="true"></span> Logout</a></li>
				</ul>
			</nav>
		</div><!-- left-col -->
		<div class="col-md-10 col-xs-12 right-col">