<h2 class="page-header">Users</h2><a href="<?php echo D_ROOT; ?>/view/users/add-user.php" class="btn btn-success">Add User</a>
<table class="table table-striped table-hover">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($users as $user) : ?>
	<tr>
		<td><?php echo $user['user_firstName']; ?></td>
		<td><?php echo $user['user_lastName']; ?></td>
		<td><?php echo $user['user_email']; ?></td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post">
				<input type="hidden" name="action" value="edit-user-id">
				<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
				<input type="submit" class="btn btn-primary" value="Edit user">
				<!-- SEND THE ID TO INDEX.PHP EDIT_CARD_FORM -->
			</form>
			
		</td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post">
				<input type="hidden" name="action" value="delete-user">
				<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
				<input type="submit" class="btn btn-danger" value="Delete user">
			</form>
			
		</td>
	</tr>
	<?php endforeach; ?>
</table>