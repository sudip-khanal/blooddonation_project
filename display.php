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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
    .container {
        padding-left: 6em;
    }
    </style>

</head>
<?php include('admin/Aheader.php'); ?>
<div class="container">

    <div>
        <h4>Add Doners</h4><button class=" btn btn-dark"><a href="donerValidation.php">Add</a></button>
    </div>

    <div class="display">
        <table class="table table-bordered  table-hover  table-responsive "><br><br>
            <h3>Doners list</h3>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>District</th>
                    <th>location</th>
                    <th>ward num</th>
                    <th>Registered Time</th>
                    <th colspan=2>Operation</th>
                </tr>

            </thead>
            <tbody>
                <?php
                 //connectio with database
                 include('connection/connection_database.php');
            //query
            $sql = 'SELECT *FROM doners';

             $result = mysqli_query($conn,$sql);

             if($result){
              while($row=mysqli_fetch_assoc($result)){
                
                $id=$row['id'];
                $firstName=$row['firstName'];
                $lastName =$row['lastName'];
                $Age=$row['Age'];
                $emailId=$row['email'];
                $Number=$row['phone_number'];
                $bloodGroup=$row['blood_group'];
                $location=$row['location'];
                $district=$row['district'];
                $ward_number=$row['ward_num'];
                $created=$row['registerrd_at'];
                echo'<tr>
                <td>'.$id.'</td>
                <td>'.$firstName.' '.$lastName.'</td>
                <td>'.$Age.'</td>
                <td>'.$bloodGroup.'</td>
                <td>'.$emailId.'</td>
                <td>'.$Number.'</td>
                <td>'.$district.'</td>
                <td>'.$location.'</td>
                <td>'.$ward_number.'</td>
                <td>'.$created.'</td>
                <td>
                <button class="btn btn-secondary"><a href="Update.php?edit_id='.$id.'">Edit</a></button> </td>
                <td> <button class="btn btn-danger"><a href="delete.php?delete_id='.$id.'">Delete</a></button></td>
              </tr>
        ';
              }
            } 
            ?>
        </table>
    </div>


</div>

<?php include('admin/Afooter.php'); ?>


</html>