<?php
include "config.php";

$std_id = $_POST['id'];

$sql = "SELECT * FROM students WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");


if(mysqli_num_rows($result)>0){

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>
                <td>First Name:</td>
                <td><input type="text" id="edit_fname" value="'. $row['first_name'] .'"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" id="edit_lname" value="'. $row['last_name'] .'"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="'.$row['id'].'" id="edit-id">
                    <input type="button" value="Update Data" id="edit-data">
                </td>
            </tr>';
    }

    mysqli_close($conn);
}else{
    echo "<h2>Record Not Found.</h2>";
}
