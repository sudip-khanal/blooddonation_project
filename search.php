<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Table.css">
    <style>
    .searchButton:hover {
        background: #991a0f;
        color: #fff;
    }

    section::before {
        background: linear-gradient(45deg, #7b0000, #991a0f);
    }
    </style>
</head>

<?php include('hf-tamplet/header.php'); ?>
<section>
    <div class="content">
        <h2> To See The Donor List Search By Blood Group Type</h2>
        <p>Your blood group depends on which antigens occur on the surface of your red blood cells.
            Your genetic make-up, which you inherit from your parents, determines which antigens are present
            on your red blood cells. Your blood group is said to </p>
        <p>A+ (A positive) if you have A and rhesus antigens.
            A− (A negative) if you have A antigens but don't have rhesus antigens.
            B+ (B positive) if you have B and rhesus antigens.
            B− (B negative) if you have B antigens but don't have rhesus antigens.
            AB+ (AB positive) if you have A, B and rhesus antigens.
            AB− (AB negative) if you have A and B antigens but don't have rhesus antigens.
            O+ (O positive) if you have neither A nor B antigens but you have rhesus antigens.
            O− (O negative) if you don't have A, B or rhesus antigens.</p>
        <br><br><br><br><br>
        <form action="" method="GET" class="input">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" name="search"
                        value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>"
                        placeholder="Enter the blood group type.." required>
                    <button type="submit" name="" class="searchButton">search</button>
                </div>
            </div>
        </form>
    </div>
</section>




<table class="table">
    <caption style="background-color: lightgreen;">Search Result Will Appear Here</caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Address</th>
        </tr>
    </thead>

    <tbody>
        <?php
                  $conn=mysqli_connect('localhost','sudip','sk990088','blood_donation');


                if(isset($_GET['search'])){

                    $filtervalues=$_GET['search'];
                    $query="SELECT * FROM doners WHERE CONCAT(blood_group) LIKE '%$filtervalues%'";
                    $query_run=mysqli_query($conn,$query);

                    if(mysqli_num_rows( $query_run)>0){

                        foreach($query_run as $items)
                        {
                            ?>
        <tr>
            <td> <?=$items['firstName']; ?> <?=$items['lastName']; ?> </td>
            <td> <?=$items['Age']; ?> </td>
            <td> <?=$items['blood_group']; ?> </td>
            <td> <?=$items['district']; ?> <?=$items['location']; ?> <?=$items['ward_num']; ?></td>

        </tr>

        <?php
                             }
                    }else{
                        ?>
        <tr>
            <td colspan="5">No Record Found </td>
        </tr>
        <?php
                    }
                }
                ?>
    </tbody>
</table>



<?php include('hf-tamplet/footer.php'); ?>


</html>