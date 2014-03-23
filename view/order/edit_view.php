<h2>Edit Order</h2>
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
<form action='index.php?resource=order&action=create' method='post' id='new_order_form' class="form-horizontal" role="form">
	<input type='hidden' name='productOrdered' value='<?php echo $result->getProductOrdered()->getId(); ?>' /><br/>
  <div class="form-group">
    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="quantity" name='quantity' value="<?php echo $result->getQuantity(); ?>" />
    </div>
  </div>
	<?php if(count($customers) == 0) { ?>
		<strong>No Customers!</strong><br />
		<a href="index.php?resource=customer&action=new" class="addlink btn btn-warning">Add Customer</a>
	<?php } else { ?>
	   <div class="form-group">
	    <label for="purchaser" class="col-sm-2 control-label">Customer</label>
	   	 <div class="col-sm-10">
				<select name="purchaser" class="form-control input-lg">
				<?php
					for($i = 0; $i < count($customers); $i++) {
						$row = $customers[$i];
						if($row['id'] == $result->getPurchaser()->getId()) {
							echo "<option value='" . $row['id'] . "' selected>";
						} else {
							echo "<option value='" . $row['id'] . "'>";
						}
						$optionstring = $row['name'] . " - " . $row['address1'];
						if (!empty($row['address2'])) {
							$optionstring .= " #" . $row['address2'];
						}
						$optionstring .= " " . $row['city'] . ", " . $row['state'];
						echo $optionstring;
						echo "</option>\n";
					}
				?>
				</select>
			</div>
		</div>
	<?php } //close if ?>
	<div class="form-group">
		<div class="col-sm-3 col-md-offset-2">
			<input type="submit" class='btn btn-primary' value='Update Order'></input>
			<a href='index.php?resource=product&action=index' class='btn btn-default'>Cancel</a>
		</div>
	</div>
</form>