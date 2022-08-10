<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System</title>
    <link rel="stylesheet" href="Table.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .content ol.list {
        list-style-type: upper-roman;
        color: #fff;
        font-size: 1em;
        list-style-position: inside;
    }

    section::before {
        background: linear-gradient(45deg, #7b0000, #991a0f);
    }
    </style>

</head>
<?php include('hf-tamplet/header.php'); ?>
<section>
    <div class="content">
        <h2>The list of blood request is here if you can help them some contact detail are listed Below</h2>
        <p> "Make each new day count by helping someone or just making someone smile." Catherine Pulsifer</p>
        <p>Some benifits of blood Donation <br> </p>
        <ol class="list">
            <li>Boosts liver and heart health.</li>
            <li>Lower risks of cancer.</li>
            <li>Help lose weight and reduce obesity.</li>
            <li>Enhance pancreas and gallbladder function.</li>
            <li>Not to forget, the joy of saving a life.</li>
        </ol>

    </div>
</section>
<div class="display">
    <table class="table">
        <caption style="background-color: lightgreen;">Blood Requests</caption>
        <thead>
            <tr>
                <th> Full Name</th>
                <th>Contact </th>
                <th>Blood Group</th>
                <th>Email Id</th>
                <th>Request date and Time</th>

            </tr>
        </thead>
        <tbody>
            <?php
                    //connectio with database
                    include('connection/connection_database.php');
               //query
               $sql = 'SELECT *FROM request';
   
                $result = mysqli_query($conn,$sql);
   
                if($result){
                 while($row=mysqli_fetch_assoc($result)){
                   
                 //  $id=$row['id'];
                   $Name=$row['fname'];
                   $contact =$row['phoneNumber'];
                   $bloodGroup =$row['bloodGroup'];
                   $emailId=$row['email'];
                   $created=$row['request_time'];
                   echo'<tr>
                  
                   <td>'.$Name.'</td>
                   <td>'.$contact.'</td>
                   <td>'.$bloodGroup.'</td>
                   <td>'.$emailId.'</td>
                   <td>'.$created.'</td>

                   </tr>
                   ';
                         }
                       } 
                       ?>
    </table>
</div>
<?php include('hf-tamplet/footer.php'); ?>


</html>