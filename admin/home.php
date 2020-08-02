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

<title>Home</title>
<style >
  body{
display: initial;
  }
</style>
<!-- Content Section -->
<div style="padding-left: 0px;" class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="margin:20px;">Books Management</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button style="margin:10px;" class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="ISBN">ISBN</label>
                    <input type="text" id="isbn" placeholder="ISBN" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" placeholder="Title" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" placeholder="Publishers" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input type="text" id="image" placeholder="Image" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textarea" id="description" placeholder="Description" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" placeholder="Price" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" placeholder="Quantity" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="publisher_id">Publisher </label>

                    <select id="publisherid"  class="form-control">
                       <?php $query="SELECT DISTINCT publisherid, publisher_name FROM publisher INNER JOIN books ON publisherid=publisher_id";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_assoc($result)){ ?>
                        <option id="publisherid" value="<?php echo $row['publisherid']?>" ><?php echo $row['publisher_name']?>  </option>
                    <?php }?>
                </select>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
        </div>
    </div>
</div>
</div>
<!-- // Modal -->

<!-- Modal - Update Book details -->
<div class="modal fade" id="update_book_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

             <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" id="update_isbn" placeholder="ISBN" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="update_title" placeholder="Title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="update_author" placeholder="Publishers" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="text" id="update_image" placeholder="Image" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="textarea" id="update_description" placeholder="Description" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="update_price" placeholder="Price" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="update_quantity" placeholder="Quantity" class="form-control"/>
            </div>

                <div class="form-group">
                    <label for="publisher_id">Publisher</label>
                    <select id="update_publisherid"  class="form-control">
                   <?php $query="SELECT DISTINCT publisherid, publisher_name FROM publisher INNER JOIN books ON publisherid=publisher_id";
                   $result = mysqli_query($db, $query);
                   while($row = mysqli_fetch_assoc($result)){ ?>
                    <option id="update_publisherid" value="<?php echo $row['publisherid']?>" ><?php echo $row['publisher_name']?>  </option>
                <?php }?>
            </select>
        </div>
     

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="UpdateBookDetails()" >Save Changes</button>
        <input type="hidden" id="hidden_book_id">
    </div>
</div>
</div>
</div>
<!-- // Modal -->

<?php
require_once "../layout/layout2.php";
?>
<script type="text/javascript" src="/resources/modal.js"></script>