<h2>Edit Customer</h2>
<form action='index.php?resource=customer&action=update' method='post' id='edit_customer_form' class="form-horizontal" role="form">
	<input type="hidden" name='id' value='<?php echo $result->getId(); ?>'/>
	<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->getName(); ?>"/>
    </div>
  </div>
  	<div class="form-group">
    <label for="address1" class="col-sm-2 control-label">Street Address</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $result->getAddress1(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="address2" class="col-sm-2 control-label"> </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $result->getAddress2(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="city" name="city" value="<?php echo $result->getCity(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="state" class="col-sm-2 control-label">State</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="state" name="state" value="<?php echo $result->getState(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $result->getZip(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $result->getPhone(); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 col-md-offset-2">
    	<input type="submit" class="btn btn-primary"/> <a href='index.php?resource=customer&action=show&id=<?php echo $result->getId(); ?>' class="btn btn-default">Cancel</a>
    </div>
  </div>
</form>