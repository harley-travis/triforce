<?php include('view/header.php'); ?>

<div class="container checkout-wrapper">

	<form action="." method="post" id="checkout-form">
	
		<input type="hidden" name="action" value="checkout">
				
		<h2>Customer Information</h2><hr>
				
		<div class="form-group">
			<input type="text" name="firstName" id="firstName" placeholder="First Name">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="lastName" id="lastName" placeholder="Last Name">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="email" name="email" id="email" placeholder="Email">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="phone" id="phone" placeholder="Phone Number">
		</div><!-- form-group -->
		
		<h2>Billing Information</h2><hr>
				
		<div class="form-group">
			<input type="text" name="nameCard" id="nameCard" placeholder="Name on Card">
		</div><!-- form-group -->		
			
		<div class="form-group">
			<input type="text" name="cardNumber" id="cardNumber" placeholder="Card Number">
		</div><!-- form-group -->
			
		<div class="form-group">
			<input type="text" name="securityCode" id="securityCode" placeholder="Security Code">
		</div><!-- form-group -->
				
		<div class="form-group">
			<input type="text" name="addressOne" id="addressOne" placeholder="Address One">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="addressTwo" id="addressTwo" placeholder="Address Two">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="state" id="state" placeholder="State">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="zip" id="zip" placeholder="Zip Code">
		</div><!-- form-group -->
		
		<h2>Shipping Information</h2><hr>
		
		<input type="checkbox" name="sameAsBilling" placeholder="Same As Billing">
		
		<div class="form-group">
			<input type="text" name="shipTo" id="shipTo" placeholder="Ship To">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="addressOne" id="addressOne" placeholder="Address One">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="addressTwo" id="addressTwo" placeholder="Address Two">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="state" id="state" placeholder="State">
		</div><!-- form-group -->
		
		<div class="form-group">
			<input type="text" name="zip" id="zip" placeholder="Zip Code">
		</div><!-- form-group -->
		
	</form>

</div><!-- checkout-wrapper -->


<?php include('view/footer.php'); ?>

