<?php

  //db connection
  require('../../config/db_connection.php');
  //Get data from register form


  $email = $_POST['email'];
  $pass = $_POST['passwd'];

  //encrypt password using md5 hashing algorithm
  $enc_pass = md5($pass);

//validate if email already exists
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = pg_query($conn, $query);
  $row = pg_fetch_assoc($result);
  if($row){
    echo "<script>alert('Email already exists')</script>";
    header('refresh:0; url=//127.0.0.1/beta/api/src/signup_form.html'); //redirect to signup page if email already exists
    exit();
  }

  //Query to insert data into users table
  $query = "INSERT INTO users (email, password) 
  VALUES ('$email', '$enc_pass')";
  //Execute the query
  $result = pg_query($conn, $query);
 
  if($result){
    echo "<script>alert('Registration succesful')</script>";
    header('refresh:0; url=//127.0.0.1/beta/api/src/login_form.html'); //redirect to login page if registration successful
  }else{
    echo "Registration failed! ";
  }
  
  pg_close($conn);

?>