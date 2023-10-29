<?php
include "config.php";
$student_id = $_POST['id'];



$sql = "DELETE FROM students WHERE id = {$student_id}";
// $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}

mysqli_close($conn);