<?php
include('connection/connection_database.php');
//session_start();
$firstName=$lastName=$Age=$emailId=$Number=$district=$bloodGroup=$location=$ward_number='';

$errors= array ('firstName'=>'','lastName'=>'','Age'=>'','emailId'=>'','Mobile_Number'=>'','bloodGroup'=>'',
'district'=>'','location'=>'','ward_number'=>'');


if(isset($_POST['submit'])){
  //validation of firstName
  if(empty($_POST['firstName'])){
    $errors['firstName']= 'Please Enter Your First Name.';
  }else{
     $firstName = $_POST['firstName'];
     if(!preg_match('/^[a-zA-Z ]*$/',$firstName)){
    $errors['firstName']= 'First Name Should Be Letter And Spaces Only..!';
     }

  }

  //validation of lastName
  if(empty($_POST['lastName'])){
    $errors['lastName']= 'Please Enter Your Last Name.';
  }else{
      $lastName = $_POST['lastName'];
     if(!preg_match('/^[a-zA-Z ]*$/',$lastName)){
      $errors['lastName']='Last Name Should Be Letter And Spaces Only..!';
     }
  }
 //validation of Age
 if(empty($_POST['Age'])){
  $errors['Age']= 'Please Enter Your Age.';
  }else{
    $Age=$_POST['Age']; 
     if($Age>=18 && $Age<=50){
   }   else{
    $errors['Age']= ' Age Must Be Between 18 to 50..!';
  }
  }
//validation of emailId
if(empty($_POST['emailId'])){
  $errors['emailId']= 'Please Enter Your Email.';
  }
  
  else{
     $emailId = $_POST['emailId'];
    if(!filter_var($emailId,FILTER_VALIDATE_EMAIL)){
      $errors['emailId']='Email Must Be An Valid Email Address..!';
    }
  }
//validation of contact number

if(empty($_POST['Mobile_Number'])){
  $errors['Mobile_Number']= 'Please Enter Your Phone Number.';
}else{
  $Number=($_POST['Mobile_Number']);
  if(!preg_match('/^[0-9]{10,10}$/',$Number)){ 
    $errors['Mobile_Number']='Please Enter The Valid Phone Number..!';
  }
}

  //validation of location
  if(empty($_POST['location'])){
    $errors['location']= 'Please Enter Your location.';
  }else{
     $location = ($_POST['location']);
     if(!preg_match('/[A-Za-z0-9\-\\,.]+/',$location)){
      $errors['location']= 'Invalid location..!';
     }

  }
  //validation of bloodGroup
  if(empty($_POST['bloodGroup'])){
    $errors['bloodGroup']=  'Please Select Your Blood Group Type.';
  }else{
      $bloodGroup = ($_POST['bloodGroup']);
    }
  //  validation of district
  if(empty($_POST['district'])){
    $errors['district']= 'Plesae Your District.';
  }else{
    $district=($_POST['district']);
  }

if(empty($_POST['ward_number'])){
    $errors['ward_number']= 'Plesae Your ward_number.';
  }else{
    $ward_number=($_POST['ward_number']);
  }



      if(array_filter($errors)){
        //$_SESSION['status']="some field is missing";
        //$_SESSION['status_code']='error';
        // echo 'some field is missing';
      }else{

$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
$Age=mysqli_real_escape_string($conn,$_POST['Age']);
$emailId=mysqli_real_escape_string($conn,$_POST['emailId']);
$Number=mysqli_real_escape_string($conn,$_POST['Mobile_Number']);
$location=mysqli_real_escape_string($conn,$_POST['location']);


//creating sql
$sql="INSERT INTO doners(firstName,lastName,Age,email,phone_number,blood_group,district,location,ward_num)
VALUES('$firstName','$lastName','$Age','$emailId',' $Number','$bloodGroup','$district','$location','$ward_number')";
 //save to dattabase
  if(mysqli_query($conn,$sql)){
   echo '<script type="text/javascript">alert(" Congratulation Registered Succesfully")</script>';
  // header('location:donerValidation.php');

 }else{
   //error
   echo 'query error: '.mysqli_error($conn);
        }
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formStyle.css">
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
    .picture {
  display: flex;
  float:right;
  width: 43.98%;
  height: auto;
  margin-top: 80px;
 
}

img {

  width:100%;
  height:720px;
  object-fit: fill;
}

    </style>
</head>
<?php include('hf-tamplet/header.php'); ?>
<section>
    <div class="content">
        <h2>To became a donor fill the donor registratio form properly.. </h2>
        <p>limitations based on the medical conditions of the blood donor.</p>
        <ol class="list">
            <li>be 18 to 60 years old</li>
            <li>weight above 45 kg</li>
            <li>have hemoglobin above 12 gm/dl</li>
            <li>have blood pressure 110-160 / 70-96 mmHg</li>
        </ol>
    </div>
</section>
<div class="picture"><img src="images/pic2.jpeg"></div>

<div class="container">
    <div class="title">Doner Registration</div>
    <div class="pinfo">Personal Information</div>
    <div class="content">
        <form action="donerValidation.php" method="post">
            <div class="user-details">

                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your first name" name="firstName" autocomplete="off"
                        value="<?php echo htmlspecialchars($firstName)?>">
                    <span class="messsage"><?php echo $errors['firstName'];?></span>
                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" name="lastName" autocomplete="off"
                        value="<?php echo htmlspecialchars($lastName)?>">
                    <span class="messsage"> <?php echo $errors['lastName'];?> </span>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" name="emailId" autocomplete="off"
                        value="<?php echo htmlspecialchars($emailId)?>">
                    <span class="messsage"> <?php echo $errors['emailId'];?> </span>
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" autocomplete="off" name="Mobile_Number"
                        maxlength="10" value="<?php echo htmlspecialchars($Number)?>">
                    <span class="messsage"> <?php echo $errors['Mobile_Number'];?> </span>
                </div>

                <div class="input-box">
                    <span class="details">Age</span>
                    <input type="number" placeholder="Enter your age" autocomplete="off" name="Age"
                        value="<?php echo htmlspecialchars($Age)?>">
                    <span class="messsage"> <?php echo $errors['Age'];?> </span>
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
                        <option value="unknown" <?php if($bloodGroup=='Unknown'){ echo "selected";}?>>Unknown</option>
                    </select> <br>
                    <span class="messsage"> <?php echo $errors['bloodGroup'];?> </span>
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
                        <option value="Sindhuli" <?php if($district=='Sindhuli'){ echo "selected";}?>>Sindhuli</option>
                        <option value="Ramechhap" <?php if($district=='Ramechhap'){ echo "selected";}?>>Ramechhap
                        </option>
                        <option value="Dolkha" <?php if($district=='Dolkha'){ echo "selected";}?>>Dolkha</option>
                        <option value="Sindhupalchauk" <?php if($district=='Sindhupalchauk'){ echo "selected";}?>>
                            Sindhupalchauk</option>
                        <option value="Kavreplanchauk" <?php if($district=='Kavreplanchauk'){ echo "selected";}?>>
                            Kavreplanchauk</option>
                        <option value="Lalitpur" <?php if($district=='Lalitpur'){ echo "selected";}?>>Lalitpur</option>
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
                        <option value="Nawalparasi" <?php if($district=='Nawalparasi'){ echo "selected";}?>>Nawalparasi
                        </option>
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
                        <option value="Jajarkot" <?php if($district=='Jajarkot'){ echo "selected";}?>>Jajarkot</option>
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
                        <option value="Darchula" <?php if($district=='Darchula'){ echo "selected";}?>>Darchula</option>
                    </select>
                    <span class="messsage"> <?php echo $errors['district'];?> </span>
                </div>

                <div class="input-box">
                    <span class="details">Location</span>
                    <input type="text" placeholder="Enter your location" autocomplete="off" name="location"
                        value="<?php echo htmlspecialchars($location)?>">
                    <span class="messsage"> <?php echo $errors['location'];?> </span>
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
                    </select> <br>
                    <span class="messsage"> <?php echo $errors['ward_number'];?> </span>
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Register" name="submit" id="submit">
            </div>

        </form>

    </div>
</div>
    
<?php include('hf-tamplet/footer.php'); ?>

</html>