<?php
    // include Database connection file 
    include("../connection.php");
    include ("../registration/registration-funtctions.php");
 $id=$_SESSION['user']['id'];
    // Design initial table header 
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email/s</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Country</th>
                            <th>Update</th>
                        </tr>';
 
    $query = "SELECT * FROM Users where id=$id;";
 
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
                <td>'.$row['fname'].'</td>
                <td>'.$row['lname'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['adress'].'</td>
                <td>'.$row['city'].'</td>
                <td>'.$row['zip_code'].'</td>
                <td>'.$row['country'].'</td>
                <td>
                    <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
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