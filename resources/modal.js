function addRecord() {
    // get values
    var isbn = $("#isbn").val();
    var title = $("#title").val();
    var author = $("#author").val();
    var image = $("#image").val();
    var description = $("#description").val();
    var price = $("#price").val();
    var quantity = $("#quantity").val();
    var publisherid = $("#publisherid").val();

    // Add record
    $.post("addRecord.php", {
        isbn: isbn,
        title: title,
        author: author,
        image: image,
        description: description,
        price: price,
        quantity: quantity,
        publisherid: publisherid,
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#isbn").val("");
        $("#title").val("");
        $("#author").val("");
        $("#image").val("");
        $("#description").val("");
        $("#price").val("");
        $("#quantity").val("");
        $("#publisherid").val("");
    });
}

// READ records
function readRecords() {
    $.get("readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
       
    });
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});

function DeleteBook(id) {
    var conf = confirm("Are you sure, do you really want to delete this book?");
    if (conf == true) {
        $.post("deleteBook.php", {
            id: id
        },
        function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
            );
    }
}

function GetBookDetails(id)
{
    $("#hidden_book_id").val(id);
    $.post("readBookDetails.php", {
        id: id
    },
    function (data, status) {
            // PARSE json data
            var book = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_isbn").val(book.book_isbn);
            $("#update_title").val(book.book_title);
            $("#update_author").val(book.book_author);
            $("#update_image").val(book.book_image);
            $("#update_description").val(book.book_descr);
            $("#update_price").val(book.book_price);
            $("#update_quantity").val(book.quantity);
            $("#update_publisherid").val(book.publisher_id);
        }
        );
    // Open modal popup
    $("#update_book_modal").modal("show");
}

function UpdateBookDetails() {
    // get values

    var isbn = $("#update_isbn").val();
    var title = $("#update_title").val();
    var author = $("#update_author").val();
    var image = $("#update_image").val();
    var description = $("#update_description").val();
    var price = $("#update_price").val();
    var quantity = $("#update_quantity").val();
    var publisherid = $("#update_publisherid").val();

    // get hidden field value
    var id = $("#hidden_book_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateBookDetails.php", {
        id:id,
        isbn: isbn,
        title: title,
        author: author,
        image: image,
        description: description,
        price: price,
        quantity: quantity,
        publisherid: publisherid
    },
    function (data, status) {
            // hide modal popup
            $("#update_book_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
        );
}

