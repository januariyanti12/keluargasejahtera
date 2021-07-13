<?php
include "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}else{
session_start();
$login =("select * from users where username='$username' and password='$password'");
$query = mysqli_query($connections,$login);
if (mysqli_num_rows($query) > 0){
$_SESSION['username'] = $username;
header("location:index.php");
}else{
echo "<script>alert('Username atau Password salah')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}
}

?>