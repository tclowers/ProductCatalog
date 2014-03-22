<h2>New Customer</h2>

<form action='index.php?resource=customer&action=create' method='post' id='new_customer_form' class="form-horizontal" role="form">
	<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" name="name" />
    </div>
  </div>
  	<div class="form-group">
    <label for="address1" class="col-sm-2 control-label">Street Address</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="address1" name="address1" />
    </div>
  </div>
  <div class="form-group">
    <label for="address2" class="col-sm-2 control-label"> </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="address2" name="address2" />
    </div>
  </div>
  <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="city" name="city" />
    </div>
  </div>
  <div class="form-group">
    <label for="state" class="col-sm-2 control-label">State</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="state" name="state" />
    </div>
  </div>
  <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="zip" name="zip" />
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone" name="phone" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 col-md-offset-2">
    	<input type="submit" class="btn btn-primary"/> <a href='index.php?resource=customer&action=index' class="btn btn-default">Cancel</a>
    </div>
  </div>
</form>