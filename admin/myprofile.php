<?php
include ("../registration/registration-funtctions.php");
require_once "../layout/layout1.php";
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: registration/login.php');}
$id=$_SESSION['user']['id'];


?>

<title>My Profile</title>

<hr>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Profile Management</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-sm-3">
    <div class="text-center">
				<img src="https://www.kindpng.com/picc/m/22-223910_circle-user-png-icon-transparent-png.png" class="avatar img-circle img-thumbnail" alt="avatar">
			</div>
		</div>
</div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>
 
            <div class="recordsuser_content"></div>
        </div>
    </div>
</div>


<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
 
              <div class="form-group">
							<label for="first_name"><h4>First Name</h4></label>
							<input type="text" class="form-control" name="fname" id="update_fname" value="" title="Enter your first name">
					</div>
					<div class="form-group">
							<label for="last_name"><h4>Last Name</h4></label>
							<input type="text" class="form-control" name="lname" id="update_lname" value=""title="Enter your last name">
					</div>
					<div class="form-group">
						
							<label for="email"><h4>Email</h4></label>
							<input type="email" class="form-control" name="email" id="update_email"  title="Enter your email" value="">
						
					</div>
					<div class="form-group">
						
							<label for="phone"><h4>Phone Number</h4></label>
							<input type="phone" class="form-control" name="phone" id="update_phone"  title="Enter your adress" value="">
						
					</div>

					<div class="form-group">
						
							<label for="phone"><h4>Adress</h4></label>
							<input type="text" class="form-control" name="adress" id="update_adress"  title="Enter your adress" value="">
						
					</div>
					<div class="form-group">
						
							<label for="phone"><h4>City</h4></label>
							<input type="text" class="form-control" name="city" id="update_city" value="" title="Enter your city">
						
					</div>
					<div class="form-group">
						
							<label for="phone"><h4>Zip Code</h4></label>
							<input type="text" class="form-control" name="zip" id="update_zip" value="" title="Enter your zip code">
						
					</div>
					<div class="form-group">
						
							<label for="phone"><h4>Country</h4></label>
							<input type="text" class="form-control" name="country" id="update_country" value="" title="Enter your country">
						
					</div>
			
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>



<?php require_once "../layout/layout2.php"; ?>

<script type="text/javascript" src="../resources/myprofile.js"></script>
