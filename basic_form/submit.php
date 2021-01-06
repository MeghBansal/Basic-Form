<?php

$con = mysqli_connect("localhost","root","","form","3308") or die(mysqli_error($con));
session_start();
$name =mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$pass = mysqli_real_escape_string($con,$_POST['pwd']);
$confirmPass = mysqli_real_escape_string($con,$_POST['confirmPass']);
$address = mysqli_real_escape_string($con,$_POST['address']);

$file =$_FILES['file']["name"];

$error = '';
if($pass != $confirmPass){
    $error = "Confirm Password Has to be same!!" ;
    echo($error);
}else{
    $registration_query = "INSERT INTO user(name,email,password,file,address) VALUES
		('$name','$email','$pass','$file','$address')";
    $registration_submit = mysqli_query($con,$registration_query) or die(mysqli_error($con));
    $_SESSION['name']=$name;
    header("location: index.php");
}
?>