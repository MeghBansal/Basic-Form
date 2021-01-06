<?php
$con = mysqli_connect("localhost","root","","form","3308") or die(mysqli_error($con));
session_start();

$name = $_SESSION['name'];
if($_GET['address']){
    $address = $_GET['address'];
    $remove_query = "UPDATE user SET address = Null";
    $remove_submit = mysqli_query($con,$remove_query);
}
if($_GET['email']){
    $address = $_GET['email'];
    $remove_query = "UPDATE user SET email = Null";
    $remove_submit = mysqli_query($con,$remove_query);
}
if($_GET['file']){
    $address = $_GET['file'];
    $remove_query = "UPDATE user SET file = Null";
    $remove_submit = mysqli_query($con,$remove_query);
}
if($_GET['name']){
    $address = $_GET['name'];
    $remove_query = "UPDATE user SET name = Null";
    $remove_submit = mysqli_query($con,$remove_query);
    session_destroy();

}
header("location: index.php")
?>