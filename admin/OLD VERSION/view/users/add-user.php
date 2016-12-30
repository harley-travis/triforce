<?php include('view/side-nav.php'); ?>
<div class="form-wrapper">
	<form action="." method="post" id="add-user">
		<input type="hidden" name="action" value="add-user">
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" id="user-first-name" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" id="user-last-name" placeholder="Last Name">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="user-email" placeholder="Email">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">
	</form>
</div><!-- form-wrapper -->