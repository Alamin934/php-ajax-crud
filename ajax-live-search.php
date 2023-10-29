<?php
include "config.php";

$search_value = $_POST['search'];

$sql = "SELECT * FROM students WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");


if(mysqli_num_rows($result)>0){
    echo '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr align="center">
        <th>Id</th>
        <th>Name</th>
        <th>Update/Delete</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr align="center">
                <td>'.$row["id"].'</td>
                <td align="left">'.$row["first_name"].' '. $row["last_name"].'</td>
                <td>
                    <button class="update-btn" data-eid="'.$row["id"].'">Update</button>
                    <button class="del-btn" data-id="'.$row["id"].'">Delete</button>
                </td>
            </tr>';
    }
    echo "</table>";
    mysqli_close($conn);
}else{
    echo "<h2>Record Not Found.</h2>";
}