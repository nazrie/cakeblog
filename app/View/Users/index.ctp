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
		<td><?php echo $this->Html->link($user['User']['username'],
			array('Controller'=> 'users', 'action' => 'add', $user['User']['id'])); ?>
		</td>
				
		<td><?php echo $user ['User']['password']; ?></td>
		<td><?php echo $user ['User']['role']; ?></td>
		<td><?php echo $user ['User']['created']; ?></td>
		
		<td> <?php echo $this->Form->postLink('Delete',
            array('action' => 'delete', $user['User']['id']),
            array('confirm' => 'Are you sure?')); ?>
        </td>
        
        <td> <?php echo $this->Html->link('Edit',
            array('action' => 'edit', $user['User']['id']),
            array('confirm' => 'Are you sure?')); ?>
        </td>
        
        <td><?php echo $this->Html->link ('Add User',
			array('Controller'=> 'users', 'action' => 'add')); ?></td>
	</tr>
	
	
	
<?php endforeach; ?>

	<?php unset($user); ?>
	
</table>


		
		
		
		
		
		