<h2>All Products</h2>
<a href="index.php?resource=product&action=new" class="addlink btn btn-primary">Add Product</a>
<table class="table  table-hover">
	<tr>
		<th class="name title">Name</th>
		<th class="description title">Description</th>
		<th class="dollarValue title">Dollar Value</th>
		<th class="lastUpdate title">Updated</th>
		<th class="options title">Options</th>
	</tr>
<?php
	for($i = 0; $i < count($allrows); $i++) {
		$row = $allrows[$i];
?>
		<tr>
			<td class='name'><?php echo $row['name']; ?></td>
			<td class='description'><?php echo $row['description']; ?></td>
			<td class='dollarValue'><?php echo $row['dollarValue']; ?></td>
		<?php
			if (isset($row['lastUpdate']) && !empty($row['lastUpdate'])) {
					$date_string = $row['lastUpdate']->format('Y-m-d');
					echo "<td class='lastUpdate'>" . $date_string . '</td>';
	   	} else {
	   		echo "<td class='lastUpdate'></td>";
	   	}
		?>
			<td>
				<a href='index.php?resource=product&action=show&id=<?php echo $row['id']; ?>'>View</a> | 
				<a href='index.php?resource=product&action=edit&id=<?php echo $row['id']; ?>'>Edit</a> | 
				<a href='index.php?resource=product&action=destroy&id=<?php echo $row['id']; ?>' class='delete-link'>Delete</a>
				<!-- | <a href='index.php?resource=order&action=new&product_id=<?//php echo $row['id']; ?>'>Place Order</a>-->
			</td>
		</tr>
<?php
	}
?>
</table>
