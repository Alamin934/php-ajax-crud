<?php
include "config.php";

$std_id = $_POST['std_id'];
$std_fname = $_POST['first_name'];
$std_lname = $_POST['last_name'];

$sql = "UPDATE students SET first_name='{$std_fname}',last_name='{$std_lname}' WHERE id = {$std_id}";

if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}

mysqli_close($conn);


