function readRecords() {
    $.get("readUserRecord.php", {}, function (data, status) {
        $(".recordsuser_content").html(data);
        
    });
}


function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_fname").val(user.fname);
            $("#update_lname").val(user.lname);
            $("#update_email").val(user.email);
            $("#update_phone").val(user.phone);
            $("#update_adress").val(user.adress);
            $("#update_city").val(user.city);
            $("#update_zip").val(user.zip_code);
            $("#update_country").val(user.country);
        }

    );
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var fname = $("#update_fname").val();
    var lname = $("#update_lname").val();
    var email = $("#update_email").val();
     var phone = $("#update_phone").val();
      var adress = $("#update_adress").val();
       var city = $("#update_city").val();
        var zip_code = $("#update_zip").val();
         var country = $("#update_country").val();
 
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateUserDetails.php", {
            id: id,
            fname: fname,
            lname: lname,
            email: email,
            phone: phone,
            adress: adress,
            city: city,
            zip_code: zip_code,
            country: country,

        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});