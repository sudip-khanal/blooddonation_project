<?php
session_start();
if(!isset($_SESSION['userName'])){
    header('location:login.php');  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
/*DASH BOARD CONTENT*/

.all-border {
    border: 1px solid transparent;
    width: auto;
    height: 800px;
}



.site-info {
    border: 1px solid trans;
    margin: 1em;
    height: auto;
    display: flex;
    padding-left: 10em;
}

body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

}

.all-quick-info {
    border: 1px solid transparent;
    width: 23%;
    height: auto;
    border-radius: 4px;
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
    margin: 0.5em;
}

.info-icon {
    font-size: 70px;
    padding: 10px 20px;
}

.info-numbers {
    font-size: 40px;
}

.text-right {
    text-align: right;
    margin-top: -90px;
    padding: 10px;
}

.info-box-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}

.user-href {
    color: #337ab7;
    display: inline-block;
}

.pull-right {
    display: none;
}

.flex-container {
    border: 1px solid trans;
    padding: 10px;
    display: flex;
}

section {
    margin: 50px;
}

/*DASHBOARD CONTENT ENDING*/
</style>
<?php include('admin/Aheader.php'); ?>
<div class='site-info'>

    <div class='all-quick-info'>

        <div class='info-icon'><i class="fa">&#xf0c0;</i></div>
        <div class='text-right'>
            <div class='info-numbers'><span><?php
               include('connection/connection_database.php');
                      $query="SELECT id from doners ORDER BY id";
                     $query_run=mysqli_query($conn,$query);
                     $row=mysqli_num_rows($query_run);
                     echo'<h2>'.$row.' </h2>';?></span></div>
            <div>Doners</div>
        </div>
        <div class='info-box-footer'>
            <a href='display.php' class='user-href'><span class="pull-left">View Details</span>
                <span class='pull-right'><i class="fa fa-arrow-circle-right"></i></span></a>
        </div>
    </div>



    <div style='background: #5cb85c; border-color: #5cb85c;' class='all-quick-info'>
        <div class='info-icon'> <i class="fa fa-envelope"></i></div>
        <div class='text-right'>
            <div class='info-numbers'><span><?php
                   $query="SELECT id from messages ORDER BY id";
                    $query=mysqli_query($conn,$query);
                    $row=mysqli_num_rows($query);
                     echo'<h2>'.$row.' </h2>';?></span></div>
            <div>Sent Messages</div>
        </div>
        <div class='info-box-footer'>
            <a href='message.php' class='user-href' style='color: #5cb85c;'><span class="pull-left">View Details</span>
                <span class='pull-right'><i class="fa fa-arrow-circle-right"></i></span></a>
        </div>
    </div>



    <div style='background: #ff5256; border-color: #ff5256;' class='all-quick-info'>
        <div class='info-icon'><i class="fa">&#xf055;</i></div>
        <div class='text-right'>
            <div class='info-numbers'><span>
                    <?php
                          $query="SELECT id from request ORDER BY id";
                          $query=mysqli_query($conn,$query);
                          $row=mysqli_num_rows($query);
                          echo'<h2>'.$row.' </h2>';?></span></div>
            <div>Blood Requests</div>
        </div>

        <div class='info-box-footer'>
            <a href='request.php' class='user-href' style='color: #ff5256;'><span class="pull-left">View Details</span>
                <span class='pull-right'><i class="fa fa-arrow-circle-right"></i></span></a>
        </div>
    </div>



    <div style='background: #f0ad4e; border-color: #f0ad4e;' class='all-quick-info'>
        <div class='info-icon'> <i class="fa">&#xf132;</i></div>
        <div class='text-right'>
            <div class='info-numbers'><span>
                    <?php
               $query="SELECT id from `admin login`ORDER BY id";
              $query=mysqli_query($conn,$query);
              $row=mysqli_num_rows($query);
              echo'<h2>'.$row.' </h2>';?></span></div>
            <div>Total Admins!</div>
        </div>

    </div>
</div>
<?php include('admin/Afooter.php'); ?>

</html>