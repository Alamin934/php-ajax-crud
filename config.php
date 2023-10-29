<?php
$conn = mysqli_connect("localhost", "root","", "php-ajax");
if(!$conn){
    die("Connection Failed").mysqli_connect_error();
}