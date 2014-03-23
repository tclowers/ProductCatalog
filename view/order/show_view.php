<h2>View Order#<?php echo $result->getId(); ?></h2>
<h3><?php echo $result->getProductOrdered()->getName(); ?>  <small>Item#: <?php echo $result->getProductOrdered()->getId(); ?></small></h3><br/>
<div>
	<dl class="dl-horizontal">
	  <dt>Description</dt>
	  <dd><?php echo $result->getProductOrdered()->getDescription(); ?></dd>
	  <dt>Width</dt>
	  <dd><?php echo $result->getProductOrdered()->getWidth(); ?>cm</dd>
	  <dt>Length</dt>
	  <dd><?php echo $result->getProductOrdered()->getLength(); ?>cm</dd>
	  <dt>Height</dt>
	  <dd><?php echo $result->getProductOrdered()->getHeight(); ?>cm</dd>
	  <dt>Weight</dt>
	  <dd><?php echo $result->getProductOrdered()->getWeight(); ?>kg</dd>
	  <dt>Value</dt>
	  <dd>$<?php echo $result->getProductOrdered()->getDollarValue(); ?> (USD)</dd>
	  <dt>Ordered: </dt>
	  <dd><?php echo $result->getOrderDate()->format('Y-m-d'); ?></dd>
	</dl>
<div>
<div class="dl-horizontal">
	  <dt>Quantity: </dt>
	  <dd>x<?php echo $result->getQuantity(); ?></dd>
	  <?php
	  	$qty = (int) $result->getQuantity();
	  	$unitPrice = (int) $result->getProductOrdered()->getDollarValue();
	  	$totalPrice = round(($qty * $unitPrice), 2);
	  ?>
	  <dt>Total: </dt>
	  <dd>$<?php echo $totalPrice; ?></dd>
</div>
<div>Shipping to:</div>
<address>
  <strong><?php echo $result->getPurchaser()->getName(); ?></strong><br>
  <?php echo $result->getPurchaser()->getAddress1(); ?><?php if (!empty($result->getPurchaser()->getAddress2())) { echo ", " . $result->getPurchaser()->getAddress2(); } ?><br>
  <?php echo $result->getPurchaser()->getCity(); ?>, <?php echo $result->getPurchaser()->getState(); ?> <?php echo $result->getPurchaser()->getZip(); ?><br>
  <abbr title="Phone">P:</abbr> <?php echo $result->getPurchaser()->getPhone(); ?>
</address>
<a href='index.php?resource=order&action=index' class="btn btn-default">Back to Orders</a> | <a href='index.php?resource=order&action=destroy&id=<?php echo $result->getId(); ?>' class="btn btn-danger delete-link">Delete</a> | <a
href='index.php?resource=order&action=edit&id=<?php echo $result->getId(); ?>' class="btn btn-primary">Edit</a>