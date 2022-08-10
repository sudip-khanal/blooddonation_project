<?php
include('connection/connection_database.php');

session_start();

if(isset($_GET['delete_id'])){
   $id=$_GET['delete_id'];
    $deletequery= "DELETE FROM doners WHERE id=$id";

    
    if(mysqli_query($conn,$deletequery)){
       //success
       $_SESSION['status']="Data deleted succesfully";
       $_SESSION['status_code']='success';
      header('location:display.php');
     
        // echo 'Delete succesfully'
    }else {
        //failure
        $_SESSION['status']="Data not deleted";
        $_SESSION['status_code']='error';
       header('location:display.php');
      
        echo 'query error:'.mysqli_error($conn);
    }

    
}

?>