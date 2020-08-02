<?php
	// include Database connection file 
	include("../connection.php");
 
	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';
 
	$query = "SELECT * FROM publisher";
 
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
				<td>'.$row['publisher_name'].'</td>
				<td>
					<button onclick="GetPublisherDetails('.$row['publisherid'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeletePublisher('.$row['publisherid'].')" class="btn btn-danger">Delete</button>
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