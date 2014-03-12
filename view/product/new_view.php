<h2>New Product</h2>
<!--<form action='index.php?resource=product&action=create' method='post' id='new_product_form'>
	Name: <input type='text' name='name' /><br/>
	Description: <textarea name='description'></textarea><br/>
	Width: <input type='text' name='cmWidth' />cm<br/>
	Length: <input type='text' name='cmLength' />cm<br/>
	Height: <input type='text' name='cmHeight' />cm<br/>
	Weight: <input type='text' name='kgWeight' />kg<br/>
	Dollar Value: $<input type='text' name='dollarValue' />(USD)<br/>
<input type="submit" />
</form>
<a href='index.php?resource=product&action=index'>Cancel</a>-->


<form action="index.php?resource=product&action=create" method="post" id="new_product_form" class="form-horizontal" role="form">
	<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" name="name"/>
    </div>
  </div>
  	<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-6">
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="width" class="col-sm-2 control-label">Width</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="width" name="width" />
	      <span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="length" class="col-sm-2 control-label">Length</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="length" name="length" />
	     	<span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="height" class="col-sm-2 control-label">Height</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="height" name="height" />
	    	<span class="input-group-addon">cm</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="weight" class="col-sm-2 control-label">Weight</label>
    <div class="col-sm-2">
    	<div class="input-group">
	      <input type="text" class="form-control" id="weight" name="weight" />
	     	<span class="input-group-addon">kg</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="dollarValue" class="col-sm-2 control-label">Dollar Value</label>
    <div class="col-sm-2">
    	<div class="input-group">
    		<span class="input-group-addon">$</span>
     		<input type="text" class="form-control" id="dollarValue" name="dollarValue" />
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 col-md-offset-2">
    	<input type="submit" class="btn btn-primary"/> <a href='index.php?resource=product&action=index' class="btn btn-default">Cancel</a>
    </div>
  </div>
</form>