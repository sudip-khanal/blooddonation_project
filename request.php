<?php
session_start();
if(!isset($_SESSION['userName'])){
    header('location:login.php');  
}
?>

<?php
    include('connection/connection_database.php');
    //query
    $sql = 'SELECT *FROM request';
     $result = mysqli_query($conn,$sql);
     if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $Name=$row['fname'];
        $contact =$row['phoneNumber'];
        $bloodGroup =$row['bloodGroup'];
        $message=$row['message'];
        $email=$row['email'];
        $created=$row['request_time'];
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style> .container{ padding-left:10em;}   </style>

</head>

<?php include('admin/Aheader.php'); ?><br><br><br>
<div class="container">
    <div class="display">
    <table class="table table-bordered  table-hover">
        <h3>Request list</h3>
            <thead>
                <tr>
                    <th>Id</th>
                    <th> Full Name</th>
                    <th>Contact </th>
                    <th>Blood Group</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Request time</th>
                    <th>Delete Request</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $count = 0;
                    foreach($result as $row) {
                        $count = $count + 1;
                   echo'<tr>
                   <td>'.$id.'</td>
                   <td>'.$Name.'</td>
                   <td>'.$contact.'</td>
                   <td>'.$bloodGroup.'</td>
                   <td>'.$email.'</td>
                   <td>'.$message.'</td> 
                   <td>'.$created.'</td>
                   <td>  <button class="btn btn-danger"><a href="Rdelete.php?delet_id='.$id.'">Delete</a></button></td>

                   </tr>
                   ';
                         }
                       ?>
        </table>
    </div>
</div>
<?php include('admin/Afooter.php'); ?>

</html>