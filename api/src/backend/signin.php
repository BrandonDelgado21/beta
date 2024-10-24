<?php
//DB/connection
require('../../config/db_connection.php');
//Get data from login form submission
$email = $_POST['email'];
$pass = $_POST['passwd'];

//encrypt password using md5 hashing algorithm
$enc_pass = md5($pass);
//Query
$query = "SELECT * FROM users WHERE email='$email' AND PASSWORD ='$enc_pass'";
  $result = pg_query($conn, $query);
  $row = pg_fetch_assoc($result);

  if($row){
    header('refresh:0; url=//127.0.0.1/beta/api/src/home.php'); //redirect to signup page if email already exist
  }else{
        echo "<script>alert('Password or email incorrect')</script>";
        header('refresh:0; url=//127.0.0.1/beta/api/src/login_form.html'); //redirect to signup page if email already exists

  }

?>