<?php

session_start();
include('connection/connection_database.php');

if(isset($_POST['submit'])){
$username = $_POST['userName'];
$password = $_POST['Password'];


$sql = "SELECT * FROM `admin login` WHERE username='$username' and password='$password'";

$query = mysqli_query($conn, $sql);

$row=mysqli_num_rows($query);
  if($row==1){
//  echo "login successful";
 $_SESSION['userName']=$username;
 header("location:dashbord.php");
  }else{
      echo'<script type="text/javascript">alert(" Login failed:Enter correct username or password ")</script>';
     // header('location:login.php');
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Blood Donation System</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #71b7e6;

    }

    .box1 {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, .5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
        border-radius: 10px;
    }

    .box1 h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
    }

    .box1 .para {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
    }

    .box1 .user-box {
        position: relative;
    }

    .box1 .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }

    .box1 .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;

    }

    .box1 .user-box input:focus~label,
    .box1 .user-box input:valid~label {
        top: -20px;
        left: 0;
        /*  color: #03e9f4;*/
        color: #fff;
        font-size: 16px;
    }

    .button {
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0;
        padding: 7px;
        /* box-shadow: inset 1px 1px 1px rgba(0,0,0,0.3); */
        width: 100px;
        padding: 7px;
        font-size: 16px;
        font-family: sans-serif;
        font-weight: 600;
        border: none;
        border-radius: 3px;
        background-color: blue;
        /* background-color: rgba(250,100,0,0.8); */
        color: #fff;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;

    }
    </style>

</head>
<?php include('hf-tamplet/header.php'); ?>


<div class="box1">
    <h2> Admin Login</h2>
    <form method="POST" action="login.php">
        <div class="user-box">
            <input type="text" name="userName" autocomplete="off" required>
            <label>Username</label>

        </div>
        <div class="user-box">
            <input type="password" name="Password" autocomplete="off" required>
            <label>Password</label>

        </div>
        <button type="submit" name="submit" class="button">Login</button>

    </form>
</div>




</html>