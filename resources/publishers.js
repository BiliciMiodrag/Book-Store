function addRecordpublisher() {
    // get values
    var name = $("#name").val();
   

    // Add record
    $.post("addPublisherRecord.php", {
        name: name,
        
    }, function (data, status) {
        // close the popup
        $("#add_new_publisher_modal").modal("hide");

        // read records again
        readpublisherRecords();

        // clear fields from the popup
        $("#name").val("");
        
    });
}

function readpublisherRecords() {
    $.get("readpublisherrecord.php", {}, function (data, status) {
        $(".records_content").html(data);
       
    });
}

function DeletePublisher(publisherid) {
    var conf = confirm("Are you sure, do you really want to delete this publisher?");
    if (conf == true) {
        $.post("deleteBook.php", {
            publisherid: publisherid
        },
        function (data, status) {
                // reload Users by using readRecords();
                readpublisherRecords();
            }
            );
    }
}

function GetPublisherDetails(publisherid)
{
    $("#hidden_publisher_id").val(publisherid);
    $.post("readpublisherdetails.php", {
        publisherid: publisherid
    },
    function (data, status) {
            // PARSE json data
            var publisher = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(publisher.publisher_name);
           
        }
        );
    // Open modal popup
    $("#update_publisher_modal").modal("show");
}
function UpdatePublisherDetails() {
    // get values

    var name = $("#update_name").val();
    

    // get hidden field value
    var publisherid = $("#hidden_publisher_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updatePublisherDetails.php", {
        publisherid:publisherid,
        name: name,
        
    },
    function (data, status) {
            // hide modal popup
            $("#update_publisher_modal").modal("hide");
            // reload Users by using readRecords();
            readpublisherRecords();
        }
        );
}

$(document).ready(function () {
    // READ recods on page load
    readpublisherRecords(); // calling function
});