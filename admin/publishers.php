<?php
include ("../registration/registration-funtctions.php");
require_once "../layout/layout1.php";

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../registration/login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>

<title>Publishers</title>
	
 <!-- Content Section -->
<div style="padding-left: 0px;" class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="margin:20px;">Publishers Management</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button style="margin:10px;" class="btn btn-success" data-toggle="modal" data-target="#add_new_publisher_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           
 
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->
 
 
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_publisher_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="name">Publisher Name</label>
                    <input type="text" id="name" placeholder="Name" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecordpublisher()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 
<!-- Modal - Update Book details -->
<div class="modal fade" id="update_publisher_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
 
               <div class="form-group">
                    <label for="name">Publisher Name</label>
                    <input type="text" id="update_name" placeholder="Name" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdatePublisherDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_publisher_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<?php
require_once "../layout/layout2.php";
?>
<script type="text/javascript" src="/resources/publishers.js"></script>