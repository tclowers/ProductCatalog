<h2>All Customers</h2>
<a href="index.php?resource=customer&action=new" class="addlink btn btn-primary">Add Customer</a>
<table class="table  table-hover">
	<tr>
		<th class="name">Name</th>
		<th class="city">City</th>
		<th class="state">State</th>
		<th class="phone">Phone</th>
		<th class="options">Options</th>
	</tr>
<?php
	for($i = 0; $i < count($allrows); $i++) {
		$row = $allrows[$i];
?>

		<tr>
			<td class='name'><?php echo $row['name']; ?></td>
			<td class='city'><?php echo $row['city']; ?></td>
			<td class='state'><?php echo $row['state']; ?></td>
			<td class='phone'><?php echo $row['phone']; ?></td>
			<td>
				<a href='index.php?resource=customer&action=show&id=<?php echo  $row['id']; ?>'>View</a>
				| 
				<a href='index.php?resource=customer&action=edit&id=<?php echo  $row['id']; ?>'>Edit</a>
				| 
				<a href='index.php?resource=customer&action=destroy&id=<?php echo  $row['id']; ?>' class='delete-link'>Delete</a>
			</td>
		</tr>
<?php
	}
?>
</table>