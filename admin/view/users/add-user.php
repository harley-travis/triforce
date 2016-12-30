<?php 
include('../header.php');
include(LEFT_COL); 
?>

<h2 class="page-header">Add user</h2>
<div class="form-wrapper">
	<form action="../../index.php" method="post" id="add-user">
	
		<input type="hidden" name="action" value="add-user">
		
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="userFirstName" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="userLastName" placeholder="Last Name">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="Password">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="Verify Password">Verify Password</label>
			<input type="password" class="form-control" name="verifyPassword" placeholder="Verify Password">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">
	</form>
</div><!-- form-wrapper -->

<?php include('../footer.php'); ?>