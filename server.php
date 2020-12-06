<?php


session_start();
include('config.php');

$FirstName ='';
$LastName ='';
$UserName='';
$Email='';
$errors = array();
$success ='good job';

//connects to the database

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//registers the user

if (isset($_POST['reg_user'])) {
$FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
$UserName = mysqli_real_escape_string($db, $_POST['UserName']);
$Email = mysqli_real_escape_string($db, $_POST['Email']);
$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);


// the array push function will be able to add the exact error that we will be referring to

if(empty($FirstName)){
    array_push($errors, 'First Name is required.');
}
if(empty($LastName)){
    array_push($errors, 'Last Name is required.');
}
if(empty($Email)){
    array_push($errors, 'EMAIL is required.');
}
if(empty($UserName)){
    array_push($errors, 'You need a Username.');
}
if(empty($Password_1)){
    array_push($errors, 'You need a Password.');
}
if($Password_1 != $Password_2){
    array_push($errors, 'Passwords do not match.');
}

//check to see if username and email have not been taken

$user_check_query = "SELECT * FROM User WHERE UserName='$UserName' OR Email = '$Email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user){
    if($user['UserName'] == $UserName){
        array_push($errors, 'Username already exists');
    }
    if($user['Email'] == $Email){
        array_push($errors, 'Email already exists');
    }


} // end if user

//if everything is okay - if there are no Errors

if(count($errors) == 0){
$Password = md5($Password_1);

$query = "INSERT INTO User (FirstName, LastName, Username, Email, Password) VALUES ('$FirstName', '$LastName', '$Email','$Password')";
mysqli_query($db, $query);

    $_SESSION['UserName'] = $UserName;
    $_SESSION['success'] = $success;
header('Location: login.php');
}


} //isset 

if(isset($_POST['login_user'])){
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']); 

    if(empty($UserName)){
        array_push($errors, 'You need a Username.');
    }
    if(empty($Password)){
        array_push($errors, 'You need a password.');
    }
    if(count($errors) == 0){
        $Password = md5($Password);
        $query = "SELECT * FROM User WHERE username ='$UserName' AND password = '$Password'";
        $results = mysqli_query($db, $query);
        if(mysqli_num_rows($results) == 1){
        $_SESSION['Username'] = $UserName;
        $_SESSION['success'] = $success;
        header('Location: index.php');
        } else {
         array_push($errors, 'Wrong username/password combination'); 
        }
    }
} // close isset
