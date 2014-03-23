<h2>New Order</h2>
<h3><?php echo $product->getName(); ?>  <small>Item#: <?php echo $product->getId(); ?></small></h3><br/>
<div>
	<dl class="dl-horizontal">
	  <dt>Description</dt>
	  <dd><?php echo $product->getDescription(); ?></dd>
	  <dt>Width</dt>
	  <dd><?php echo $product->getWidth(); ?>cm</dd>
	  <dt>Length</dt>
	  <dd><?php echo $product->getLength(); ?>cm</dd>
	  <dt>Height</dt>
	  <dd><?php echo $product->getHeight(); ?>cm</dd>
	  <dt>Weight</dt>
	  <dd><?php echo $product->getWeight(); ?>kg</dd>
	  <dt>Value</dt>
	  <dd>$<?php echo $product->getDollarValue(); ?> (USD)</dd>
	  <dt>Last Updated</dt>
	  <dd>
	  <?php
        if($product->getLastUpdate()) {
            $date_string = $product->getLastUpdate()->format('Y-m-d');
            echo $date_string;
        } else {
            echo "0-0-0";
        }
     ?>
     </dd>
	</dl>
<div>
<form action='index.php?resource=order&action=create' method='post' id='new_order_form' class="form-horizontal" role="form">
	<input type='hidden' name='productOrdered' value='<?php echo $product->getId(); ?>' /><br/>
  <div class="form-group">
    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="quantity" name='quantity' />
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
						echo "<option value='" . $row['id'] . "'>";
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
			<input type="submit" class='btn btn-primary' value='Place Order'></input>
			<a href='index.php?resource=product&action=index' class='btn btn-default'>Cancel</a>
		</div>
	</div>
</form>