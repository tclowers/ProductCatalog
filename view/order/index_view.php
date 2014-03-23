<h2>All Orders</h2>
<table class="table  table-hover">
	<tr>
		<th class="product">Product</th>
		<th class="customer">Customer</th>
		<th class="quantity">Quantity</th>
		<th class="date">Order Date</th>
		<th class="options">Options</th>
	</tr>
<?php
	foreach($results as $result) {
?>
		<tr>
			<td class='name'><?php echo $result->getProductOrdered()->getName(); ?></td>
			<td class='customer'><?php echo $result->getPurchaser()->getName(); ?></td>
			<td class='quantity'><?php echo $result->getQuantity(); ?></td>
			<td class='orderDate'><?php echo $result->getOrderDate()->format('Y-m-d'); ?></td>
			<td>
				<a href='index.php?resource=order&action=show&id=<?php echo $result->getId(); ?>'>View</a> | 
				<a href='index.php?resource=order&action=edit&id=<?php echo $result->getId(); ?>'>Edit</a> | 
				<a href='index.php?resource=order&action=destroy&id=<?php echo $result->getId(); ?>' class='delete-link'>Delete</a>
			</td>
		</tr>
<?php
	}
?>
</table>