<?php
	// include Database connection file 
	include("../connection.php");
 
	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>ISBN</th>
							<th>Title</th>
							<th>Publisher/s</th>
							<th>Image</th>
							<th>Description</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Publisher </th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';
 
	$query = "SELECT * FROM books INNER JOIN publisher ON publisher_id=publisherid";
 
	if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
 
    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['book_isbn'].'</td>
				<td>'.$row['book_title'].'</td>
				<td>'.$row['book_author'].'</td>
				<td>'.$row['book_image'].'</td>
				<td>'.$row['book_descr'].'</td>
				<td>'.$row['book_price'].'</td>
				<td>'.$row['quantity'].'</td>
				<td>'.$row['publisher_name'].'</td>
				<td>
					<button onclick="GetBookDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteBook('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>