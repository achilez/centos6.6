<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>

<p>Users List</p>

<form action="users" method="post">
<table>
	<thead>
		<tr>
			<th></th>
			<th>Username</th>
			<th>Created Date</th>
		</tr>

	</thead>
	<tbody>
		<?php if ($results) { ?>
			<?php foreach ($results as $user) { ?>

			<tr>
				<td><input type="checkbox" name="user_id[]" value="<?php echo $user['id']; ?>"></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['created_date']; ?></td>
			</tr>
			<?php } ?>
		<?php } ?>		
	</tbody>

</table>
<button type="submit" name="submit" value="delete">DELETE</button>

</form>

</body>
</html>
