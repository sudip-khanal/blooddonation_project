
<?php
session_start();
if(!isset($_SESSION['userName'])){
    header('location:login.php');  
}
?>

<?php
    include('connection/connection_database.php');
    //query
    $sql = 'SELECT * FROM messages';
     $result = mysqli_query($conn,$sql);
     if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $sub=$row['subject'];
        $message =$row['message'];
        $send_time=$row['message_time'];
            }
        }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style> .container{ padding-left:10em;}   </style>

</head>

<?php include('admin/Aheader.php'); ?><br><br><br>
<div class="container">
    <div class="display">
    <table class="table table-bordered  table-hover">
            <h3>Send Messages</h3>
            <thead>
                <tr>
                    <th>Message Id</th>
                    <th>Subject </th>
                    <th>Message</th>
                    <th>Send_Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   echo'<tr>
                   <td>'.$id.'</td>
                   <td>'. $sub.'</td>
                   <td>'.$message.'</td> 
                   <td>'.$send_time.'</td>
                   </tr>
                   ';
                         
                       ?>
        </table>
    </div>
</div>
<?php include('admin/Afooter.php'); ?>

</html>