<?php
 include('connection../connection_database.php');
 session_start();

$id =$_GET['edit_id'];
$sql="SELECT * FROM `doners` WHERE id=$id";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$firstName=$row['firstName'];
$lastName=$row['lastName'];
$Age=$row['Age'];
$emailId=$row['email'];
$Number=$row['phone_number'];
$bloodGroup=$row['blood_group'];
$location=$row['location'];
$district=$row['district'];
$ward_number=$row['ward_num'];


if(isset($_POST['submit'])){
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$Age=$_POST['Age'];
$emailId=$_POST['emailId'];
$Number=$_POST['Mobile_Number'];
$bloodGroup=$_POST['bloodGroup'];
$location=$_POST['location'];
$district=$_POST['district'];
$ward_number=$_POST['ward_number'];

 

$sql=" UPDATE `doners` SET `id` = '$id', `firstName` = '$firstName', `lastName` = '$lastName', `Age` = '$Age', `phone_number` = '$Number', `email` = '$emailId', `blood_group` = '$bloodGroup', `district` = '$district', `location` = '$location', `ward_num` = '$ward_number' WHERE `doners`.`id` = $id";
  $result =mysqli_query($conn,$sql);
  if($result){ 
    // echo '<script>alert("Data updated successfully.")</script>';
    $_SESSION['status']="Data Updated succesfully";
    $_SESSION['status_code']='success';
   header('location:display.php');
  }
  else{
    $_SESSION['status']="Data Not Updated ";
    $_SESSION['status_code']='error';
    header('location:display.php');
    die(mysqli_error($conn));
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System</title>
    <link rel="stylesheet" href="formStyle.css">

</head>

<body>

    <div class="container">
        <div class="title"> Edit Doner Details</div>
        <div class="pinfo">Personal Information</div>

        <div class="content">
            <form action="" method="post">
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your first name" name="firstName" autocomplete="off"
                            value=<?php echo $firstName;?>>
                    </div>

                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" placeholder="Enter your last name" name="lastName" autocomplete="off"
                            value=<?php echo $lastName;?>>

                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" name="emailId" autocomplete="off"
                            value=<?php echo $emailId;?>>

                    </div>

                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" autocomplete="off" name="Mobile_Number"
                            maxlength="10" value=<?php echo $Number;?>>
                    </div>

                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="number" placeholder="Enter your age" autocomplete="off" name="Age"
                            value=<?php echo $Age;?>>
                    </div>

                    <div class="input-box">
                        <span class="details">Blood Group</span>
                        <select name="bloodGroup" class="dropdown">
                            <option value="" selected hidden>--Select Blood Group Type--</option>
                            <option value="A+" <?php if($bloodGroup=='A+'){ echo "selected";}?>>A Positive</option>
                            <option value="A-" <?php if($bloodGroup=='A-'){ echo "selected";}?>>A Negative</option>
                            <option value="B+" <?php if($bloodGroup=='B+'){ echo "selected";}?>>B Positive</option>
                            <option value="B-" <?php if($bloodGroup=='B-'){ echo "selected";}?>>B Negative</option>
                            <option value="AB+" <?php if($bloodGroup=='AB+'){ echo "selected";}?>>AB Positive</option>
                            <option value="AB-" <?php if($bloodGroup=='AB-'){ echo "selected";}?>>AB Negative</option>
                            <option value="O+" <?php if($bloodGroup=='O+'){ echo "selected";}?>>O Positive</option>
                            <option value="O-" <?php if($bloodGroup=='O-'){ echo "selected";}?>>O Negative</option>
                            <option value="unknown" <?php if($bloodGroup=='Unknown'){ echo "selected";}?>>Unknown
                            </option>
                        </select>
                        </select> <br>
                    </div>

                    <div class="address">Address</p>
                    </div>

                    <div class="input-box">
                        <span class="details">District</span>
                        <select class="dropdown" name="district">
                            <option value="">--Select District--</option>
                            <option value="Taplejung" <?php if($district=='Taplejung'){ echo "selected";}?>>Taplejung
                            </option>
                            <option value="Panchthar" <?php if($district=='Panchthar'){ echo "selected";}?>>Panchthar
                            </option>
                            <option value="Ilam" <?php if($district=='Ilam'){ echo "selected";}?>>Ilam</option>
                            <option value="Jhapa" <?php if($district=='Jhapa'){ echo "selected";}?>>Jhapa</option>
                            <option value="Morang" <?php if($district=='Morang'){ echo "selected";}?>>Morang</option>
                            <option value="Sunsari" <?php if($district=='Sunsari'){ echo "selected";}?>>Sunsari</option>
                            <option value="Dhankutta" <?php if($district=='Dhankutta'){ echo "selected";}?>>Dhankutta
                            </option>
                            <option value="Sankhuwasabha" <?php if($district=='Sankhuwasabha'){ echo "selected";}?>>
                                Sankhuwasabha</option>
                            <option value="Bhojpur" <?php if($district=='Bhojpur'){ echo "selected";}?>>Bhojpur</option>
                            <option value="Terhathum" <?php if($district=='Terhathum'){ echo "selected";}?>>Terhathum
                            </option>
                            <option value="Okhaldunga" <?php if($district=='Okhaldunga'){ echo "selected";}?>>Okhaldunga
                            </option>
                            <option value="Khotang" <?php if($district=='Khotang'){ echo "selected";}?>>Khotang</option>
                            <option value="Solukhumbu" <?php if($district=='Solukhumbu'){ echo "selected";}?>>Solukhumbu
                            </option>
                            <option value="Udaypur" <?php if($district=='Udaypur'){ echo "selected";}?>>Udaypur</option>
                            <option value="Saptari" <?php if($district=='Saptari'){ echo "selected";}?>>Saptari</option>
                            <option value="Siraha" <?php if($district=='Siraha'){ echo "selected";}?>>Siraha</option>
                            <option value="Dhanusa" <?php if($district=='Dhanusa'){ echo "selected";}?>>Dhanusa</option>
                            <option value="Mahottari" <?php if($district=='Mahottari'){ echo "selected";}?>>Mahottari
                            </option>
                            <option value="Sarlahi" <?php if($district=='Sarlahi'){ echo "selected";}?>>Sarlahi</option>
                            <option value="Sindhuli" <?php if($district=='Sindhuli'){ echo "selected";}?>>Sindhuli
                            </option>
                            <option value="Ramechhap" <?php if($district=='Ramechhap'){ echo "selected";}?>>Ramechhap
                            </option>
                            <option value="Dolkha" <?php if($district=='Dolkha'){ echo "selected";}?>>Dolkha</option>
                            <option value="Sindhupalchauk" <?php if($district=='Sindhupalchauk'){ echo "selected";}?>>
                                Sindhupalchauk</option>
                            <option value="Kavreplanchauk" <?php if($district=='Kavreplanchauk'){ echo "selected";}?>>
                                Kavreplanchauk</option>
                            <option value="Lalitpur" <?php if($district=='Lalitpur'){ echo "selected";}?>>Lalitpur
                            </option>
                            <option value="Bhaktapur" <?php if($district=='Bhaktapur'){ echo "selected";}?>>Bhaktapur
                            </option>
                            <option value="Kathmandu" <?php if($district=='Kathmandu'){ echo "selected";}?>>Kathmandu
                            </option>
                            <option value="Nuwakot" <?php if($district=='Nuwakot'){ echo "selected";}?>>Nuwakot</option>
                            <option value="Rasuwa" <?php if($district=='Rasuwa'){ echo "selected";}?>>Rasuwa</option>
                            <option value="Dhading" <?php if($district=='Dhading'){ echo "selected";}?>>Dhading</option>
                            <option value="Makwanpur" <?php if($district=='Makwanpur'){ echo "selected";}?>>Makwanpur
                            </option>
                            <option value="Rauthat" <?php if($district=='Rauthat'){ echo "selected";}?>>Rauthat</option>
                            <option value="Bara" <?php if($district=='Bara'){ echo "selected";}?>>Bara</option>
                            <option value="Parsa" <?php if($district=='Parsa'){ echo "selected";}?>>Parsa</option>
                            <option value="Chitwan" <?php if($district=='Chitwan'){ echo "selected";}?>>Chitwan</option>
                            <option value="Gorkha" <?php if($district=='Gorkha'){ echo "selected";}?>>Gorkha</option>
                            <option value="Lamjung" <?php if($district=='Lamjung'){ echo "selected";}?>>Lamjung</option>
                            <option value="Tanahun" <?php if($district=='Tanahun'){ echo "selected";}?>>Tanahun</option>
                            <option value="Tanahun" <?php if($district=='Tanahun'){ echo "selected";}?>>Tanahun</option>
                            <option value="Syangja" <?php if($district=='Syangja'){ echo "selected";}?>>Syangja</option>
                            <option value="Kaski" <?php if($district=='Kaski'){ echo "selected";}?>>Kaski</option>
                            <option value="Manag" <?php if($district=='Manag'){ echo "selected";}?>>Manag</option>
                            <option value="Mustang" <?php if($district=='Mustang'){ echo "selected";}?>>Mustang</option>
                            <option value="Parwat" <?php if($district=='Parwat'){ echo "selected";}?>>Parwat</option>
                            <option value="Myagdi" <?php if($district=='Myagdi'){ echo "selected";}?>>Myagdi</option>
                            <option value="Myagdi" <?php if($district=='Myagdi'){ echo "selected";}?>>Myagdi</option>
                            <option value="Baglung" <?php if($district=='Baglung'){ echo "selected";}?>>Baglung</option>
                            <option value="Gulmi" <?php if($district=='Gulmi'){ echo "selected";}?>>Gulmi</option>
                            <option value="Palpa" <?php if($district=='Palpa'){ echo "selected";}?>>Palpa</option>
                            <option value="Nawalparasi" <?php if($district=='Nawalparasi'){ echo "selected";}?>>
                                Nawalparasi</option>
                            <option value="Rupandehi" <?php if($district=='Rupandehi'){ echo "selected";}?>>Rupandehi
                            </option>
                            <option value="Arghakhanchi" <?php if($district=='Arghakhanchi'){ echo "selected";}?>>
                                Arghakhanchi</option>
                            <option value="Kapilvastu" <?php if($district=='Kapilvastu'){ echo "selected";}?>>Kapilvastu
                            </option>
                            <option value="Pyuthan" <?php if($district=='Pyuthan'){ echo "selected";}?>>Pyuthan</option>
                            <option value="Rolpa" <?php if($district=='Rolpa'){ echo "selected";}?>>Rolpa</option>
                            <option value="Rukum" <?php if($district=='Rukum'){ echo "selected";}?>>Rukum</option>
                            <option value="Salyan" <?php if($district=='Salyan'){ echo "selected";}?>>Salyan</option>
                            <option value="Dang" <?php if($district=='Dang'){ echo "selected";}?>>Dang</option>
                            <option value="Bardiya" <?php if($district=='Bardiya'){ echo "selected";}?>>Bardiya</option>
                            <option value="Surkhet" <?php if($district=='Surkhet'){ echo "selected";}?>>Surkhet</option>
                            <option value="Dailekh" <?php if($district=='Dailekh'){ echo "selected";}?>>Dailekh</option>
                            <option value="Banke" <?php if($district=='Banke'){ echo "selected";}?>>Banke</option>
                            <option value="Jajarkot" <?php if($district=='Jajarkot'){ echo "selected";}?>>Jajarkot
                            </option>
                            <option value="Dolpa" <?php if($district=='Dolpa'){ echo "selected";}?>>Dolpa</option>
                            <option value="Humla" <?php if($district=='Humla'){ echo "selected";}?>>Humla</option>
                            <option value="Kalikot" <?php if($district=='Kalikot'){ echo "selected";}?>>Kalikot</option>
                            <option value="Mugu" <?php if($district=='Mugu'){ echo "selected";}?>>Mugu</option>
                            <option value="Jumla" <?php if($district=='Jumla'){ echo "selected";}?>>Jumla</option>
                            <option value="Bajura" <?php if($district=='Bajura'){ echo "selected";}?>>Bajura</option>
                            <option value="Bajhang" <?php if($district=='Bajhang'){ echo "selected";}?>>Bajhang</option>
                            <option value="Achham" <?php if($district=='Achham'){ echo "selected";}?>>Achham</option>
                            <option value="Doti" <?php if($district=='Doti'){ echo "selected";}?>>Doti</option>
                            <option value="Kailali" <?php if($district=='Kailali'){ echo "selected";}?>>Kailali</option>
                            <option value="Kanchanpur" <?php if($district=='Kanchanpur'){ echo "selected";}?>>Kanchanpur
                            </option>
                            <option value="Dadeldhura" <?php if($district=='Dadeldhura'){ echo "selected";}?>>Dadeldhura
                            </option>
                            <option value="Baitadi" <?php if($district=='Baitadi'){ echo "selected";}?>>Baitadi</option>
                            <option value="Darchula" <?php if($district=='Darchula'){ echo "selected";}?>>Darchula
                            </option>
                        </select>
                        <div>

                            <div class="input-box">
                                <span class="details">Location</span>
                                <input type="text" placeholder="Enter your location" autocomplete="off" name="location"
                                    value=<?php echo $location;?>>
                            </div>

                            <div class="input-box">
                                <span class="details">Ward No</span>
                                <select class="dropdown" name="ward_number">
                                    <option value="">--Select Ward number--</option>
                                    <option value="1" <?php if($ward_number=='1'){ echo "selected";}?>>1</option>
                                    <option value="2" <?php if($ward_number=='2'){ echo "selected";}?>>2</option>
                                    <option value="3" <?php if($ward_number=='3'){ echo "selected";}?>>3</option>
                                    <option value="4" <?php if($ward_number=='4'){ echo "selected";}?>>4</option>
                                    <option value="5" <?php if($ward_number=='5'){ echo "selected";}?>>5</option>
                                    <option value="6" <?php if($ward_number=='6'){ echo "selected";}?>>6</option>
                                    <option value="7" <?php if($ward_number=='7'){ echo "selected";}?>>7</option>
                                    <option value="8" <?php if($ward_number=='8'){ echo "selected";}?>>8</option>
                                    <option value="9" <?php if($ward_number=='9'){ echo "selected";}?>>9</option>
                                    <option value="10" <?php if($ward_number=='10'){ echo "selected";}?>>10</option>
                                    <option value="11" <?php if($ward_number=='11'){ echo "selected";}?>>11</option>
                                    <option value="12" <?php if($ward_number=='12'){ echo "selected";}?>>12</option>
                                    <option value="13" <?php if($ward_number=='13'){ echo "selected";}?>>13</option>
                                    <option value="14" <?php if($ward_number=='14'){ echo "selected";}?>>14</option>
                                    <option value="15" <?php if($ward_number=='15'){ echo "selected";}?>>15</option>
                                    <option value="16" <?php if($ward_number=='16'){ echo "selected";}?>>16</option>
                                    <option value="17" <?php if($ward_number=='17'){ echo "selected";}?>>17</option>
                                    <option value="18" <?php if($ward_number=='18'){ echo "selected";}?>>18</option>
                                    <option value="19" <?php if($ward_number=='19'){ echo "selected";}?>>19</option>
                                    <option value="20" <?php if($ward_number=='20'){ echo "selected";}?>>20</option>
                                    <option value="21" <?php if($ward_number=='21'){ echo "selected";}?>>21</option>
                                    <option value="22" <?php if($ward_number=='22'){ echo "selected";}?>>22</option>
                                    <option value="23" <?php if($ward_number=='23'){ echo "selected";}?>>23</option>
                                    <option value="24" <?php if($ward_number=='24'){ echo "selected";}?>>24</option>
                                    <option value="25" <?php if($ward_number=='25'){ echo "selected";}?>>25</option>
                                    <option value="26" <?php if($ward_number=='26'){ echo "selected";}?>>26</option>
                                    <option value="27" <?php if($ward_number=='27'){ echo "selected";}?>>27</option>
                                    <option value="28" <?php if($ward_number=='28'){ echo "selected";}?>>28</option>
                                    <option value="29" <?php if($ward_number=='29'){ echo "selected";}?>>29</option>
                                    <option value="30" <?php if($ward_number=='30'){ echo "selected";}?>>30</option>
                                    <option value="31" <?php if($ward_number=='31'){ echo "selected";}?>>31</option>
                                    <option value="32" <?php if($ward_number=='32'){ echo "selected";}?>>32</option>
                                    <option value="33" <?php if($ward_number=='33'){ echo "selected";}?>>33</option>
                                    <option value="34" <?php if($ward_number=='34'){ echo "selected";}?>>34</option>
                                    <option value="35" <?php if($ward_number=='35'){ echo "selected";}?>>35</option>
                                </select>
                            </div>
                        </div>

                        <div class="button">
                            <input type="submit" value="update" name="submit" id="submit">
                        </div>

            </form>
        </div>
    </div>
</body>

</html>