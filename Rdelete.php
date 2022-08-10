
<?php
include('connection/connection_database.php');
session_start();
if(isset($_GET['delet_id'])){
   $id=$_GET['delet_id'];
    $deletequery= "DELETE FROM request WHERE id=$id";

    
    if(mysqli_query($conn,$deletequery)){
       //success
       $_SESSION['status']="Data deleted succesfully";
       $_SESSION['status_code']='success';
       header('location:request.php');
     //echo '<script> alert("Delete succesfully")</script>';


    }else {

        //failure
        $_SESSION['status']="Data deleted succesfully";
        $_SESSION['status_code']='error';
       header('location:display.php');
       // echo 'query error:'.mysqli_error($conn);
    }

    
}

?>