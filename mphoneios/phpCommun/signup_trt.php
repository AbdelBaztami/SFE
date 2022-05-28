
<?php require_once "../phpCommun/fonctionsSql.php";
session_start();

// initializing variables
$username = "";
$errors = array(); 

require "db_connection.php";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqlEscape($_POST['username']);
  $password_1 = mysqlEscape($_POST['password_1']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or position


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_BCRYPT);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (user_name, password) VALUES('$username', '$password')";
  	mysqli_query($link,$query) or die(mysqli_error($link));
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// ... 