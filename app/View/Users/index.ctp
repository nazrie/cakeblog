<!-- File:/app/View/Users/index.ctp -->

<h1>Users</h1>
<table>
	<tr>
		<th>UserId</th>
		<th>Username</th>
		<th>Password</th>
		<th>Role</th>
		<th>Created</th>
	</tr>
	
<?php foreach ($users as $user): ?>
	
	<tr>	
		<td><?php echo $user ['User']['id']; ?></td>
		<td><?php echo $this->Html->link($user['User']['password'],
			array('Controller'=> 'users', 'action' => 'add', $user['User']['id'])); ?>
		</td>
		
		<td><?php echo $user ['User']['password']; ?></td>
		<td><?php echo $user ['User']['role']; ?></td>
		<td><?php echo $user ['User']['created']; ?></td>
	</tr>
	
<?php endforeach; ?>

	<?php unset($user); ?>
	
</table>


		
		
		
		
		
		