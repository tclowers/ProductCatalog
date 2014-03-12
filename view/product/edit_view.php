<h2>Edit Product</h2>
<form action="index.php?resource=product&action=update" method="post" id="edit_product_form" class="form-horizontal" role="form">
	<input type="hidden" name='id' value='<?php echo $result->getId(); ?>'/><br/>
	<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->getName(); ?>"/>
    </div>
  </div>
  	<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-6">
      <textarea class="form-control" id="description" name="description"><?php echo $result->getDescription(); ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="width" class="col-sm-2 control-label">Width</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="width" name="width" value="<?php echo $result->getWidth(); ?>"/>
	      <span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="length" class="col-sm-2 control-label">Length</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="length" name="length" value="<?php echo $result->getLength(); ?>"/>
	     	<span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="height" class="col-sm-2 control-label">Height</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="height" name="height" value="<?php echo $result->getHeight(); ?>"/>
	    	<span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="weight" class="col-sm-2 control-label">Weight</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $result->getWeight(); ?>"/>
	     	<span class="input-group-addon">kg</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="dollarValue" class="col-sm-2 control-label">Dollar Value</label>
    <div class="col-sm-2">
    	<div class="input-group">
    		<span class="input-group-addon">$</span>
     		<input type="text" class="form-control" id="dollarValue" name="dollarValue" value="<?php echo $result->getDollarValue(); ?>"/>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 col-md-offset-2">
    	<input type="submit" class="btn btn-primary"/> <a href='index.php?resource=product&action=show&id=<?php echo $result->getId(); ?>' class="btn btn-default">Cancel</a>
    </div>
  </div>
</form>