<?php
include('../header.php');
include('../left-col.php');
?>

<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/store-location/index.php" method="post" id="add-store">
	
		<input type="hidden" name="action" value="add-store">
		
		<div class="form-group">
			<label for="storeNumber">Store Number</label>
			<input type="text" class="form-control" name="store_number" placeholder="Store Number">
		</div>
		<div class="form-group">
			<label for="districtNumber">District Number</label>
			<input type="text" class="form-control" name="district_number" placeholder="District Number">
		</div>
		<div class="form-group">
			<label for="storeAddressOne">Store Address One</label>
			<input type="text" class="form-control" name="store_address_one" placeholder="Store Address One">
		</div>
		<div class="form-group">
			<label for="storeAddressTwo">Store Address Two</label>
			<input type="text" class="form-control" name="store_address_two" placeholder="Store Address Two">
		</div>
		<div class="form-group">
			<label for="storeCity">Store City</label>
			<input type="text" class="form-control" name="store_city" placeholder="Store City">
		</div>
		<div class="form-group">
			<label for="storeAddressOne">Store State</label>
			<input type="text" class="form-control" name="store_state" placeholder="Store State">
		</div>
		<div class="form-group">
			<label for="storeZip">Store Zip</label>
			<input type="text" class="form-control" name="store_zip" placeholder="Store Zip">
		</div>
		<div class="form-group">
			<label for="storePhone">Store Phone</label>
			<input type="text" class="form-control" name="store_phone" placeholder="Store Phone">
		</div>


		<a href="<?php echo D_ROOT; ?>/view/store-location/index.php?action=view-store" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Add Store" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
<?php include('../footer.php'); ?>