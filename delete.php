<?php


include('connection.php');


$id = $_GET['id'];

// delete query
$hype = " DELETE FROM  vivo WHERE id = '$id' ";

$hex = mysqli_query($conn, $hype);


if ($hex) {

    header("location:welcome.php");
}
