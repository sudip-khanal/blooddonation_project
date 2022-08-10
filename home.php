<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System</title>
    <link rel="stylesheet" href="home.css">

    <style>
    /* landinpage */


    body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh;
        font-family: sans-serif;
    }

    .Section_top {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
        background-image: url(images/blood.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        justify-content: center;
        animation: change 120s infinite ease-in-out;
    }

    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-transform: uppercase;

    }

    .content h1 {
        color: #FFFFFF;
        font-size: 70px;
        letter-spacing: 10px;
    }

    .content h1 span {
        color: #FFFFFF;
    }

    .content p {
        color: #95f4f1;
        font-size: 40px;
    }

    .content button {
        background: #85c1ee;
        padding: 10px 24px;
        text-decoration: none;
        font-size: 18px;
        border-radius: 20px;
    }

    .content button:hover {
        background: #034e88;
        color: #fff;
    }

    @keyframes change {
        0% {
            background-image: url(images/donation1.jpg);
        }

        20% {
            background-image: url(images/donation2.jpg);
        }

        40% {
            background-image: url(images/blood.jpg);
        }

        60% {
            background-image: url(images/donation3.jpg);
        }

        80% {
            background-image: url(images/donation4.jpg);
        }

        100% {
            background-image: url(images/donation1.jpg);
        }
    }


    .modal-header {
        background-color: #9fc5e8;
    }
    </style>
</head>
<?php include('hf-tamplet/header.php'); ?>
<div class="Section_top">
    <div class="content">
        <h1> <span> BLOOD DONATION</span></h1>
        <P>DONATE BLOOD BE A REAL HERO</P>

        <button id="modal-btn">Request Blood</button>

    </div>
</div>

<!--request form-->

<?php
// session_start();
include('connection/connection_database.php');


 $fname=$phone=$bloodGroup=$email=$message='';

 $errors= array ('fname'=>'','email'=>'','phone'=>'','message'=>'','bloodGroup'=>'');

 if(isset($_POST['submit'])){
  //validation of firstName
  if(empty($_POST['fname'])){
    $errors['fname']= 'Please Enter Your First Name.';
  }else{
     $fname = $_POST['fname'];
     if(!preg_match('/^[a-zA-Z ]*$/',$fname)){
    $errors['fname']= 'First Name Should Be Letter And Spaces Only..!';
     }}
     if(empty($_POST['phone'])){
      $errors['phone']= 'Please Enter Your Phone Number.';
    }else{
      $phone=($_POST['phone']);
      if(!preg_match('/^[0-9]{10,10}$/',$phone)){ 
        $errors['phone']='Please Enter The Valid Phone phone number..!';
      }
    }

//validation of emailId
if(empty($_POST['email'])){
  $errors['email']= 'Please Enter Your Email.';
  }else{
     $email = $_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['email']='Email Must Be An Valid Email Address..!';
    }
  }
  if(empty($_POST['bloodGroup'])){
    $errors['bloodGroup']=  'Please Select Your Blood Group Type.';
  }else{
      $bloodGroup = ($_POST['bloodGroup']);
    }
    $message= ($_POST['message']);

if(array_filter($errors)){
  // echo 'some field is missing';
   $_SESSION['status']="Data is Not submitted please fill the form properly!!";
    $_SESSION['status_code']='error';
}else{
  $fname=mysqli_real_escape_string($conn,$_POST['fname']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $message=mysqli_real_escape_string($conn,$_POST['message']);


 $sql="INSERT INTO request(fname,phoneNumber,bloodGroup,email,message)VALUES('$fname',' $phone','$bloodGroup','$email','$message')";

   if(mysqli_query($conn,$sql)){
   $_SESSION['status']="Data submitted succesfully";
   $_SESSION['status_code']='success';

  }else{
    echo 'query error: '.mysqli_error($conn);
     }
}
}
mysqli_close($conn);
?>
<div id="my-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2> Blood Request Form</h2>
            <p>Please Fill The Form properly.You will see a alert message if your request is submitted otherwise not..!!
            </p>
        </div>
        <div class="modal-body">

            <form action="" method="post">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="fname" placeholder="Enter Your Full Name"
                        value="<?php echo htmlspecialchars($fname)?>" required>


                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter Your Email"
                        value="<?php echo htmlspecialchars($email)?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Contact Number</span>
                    <input type="text" name="phone" placeholder="Enter Your Contact Number" maxlength="10"
                        value="<?php echo htmlspecialchars($phone)?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Blood Group</span>
                    <select name="bloodGroup" id="" required>
                        <option value="" selected hidden>--Select Blood Group Type--</option>
                        <option value="A Positive">A Positive</option>
                        <option value="A Negative">A Negative</option>
                        <option value="B Positive">B Positive</option>
                        <option value="B Negative">B Negative</option>
                        <option value="AB Positive">AB Positive</option>
                        <option value="AB Negative">AB Negative</option>
                        <option value="O Positiv">O Positive</option>
                        <option value="O Negative">O Negative</option>
                    </select>
                </div>

                <div class="input-box">
                    <span class="details">Message</span>
                    <textarea name="message" placeholder="Write a short message.."
                        value="<?php echo htmlspecialchars($message)?>"></textarea>
                </div>
                <input type="submit" name="submit" class="button" value="Send Request">
            </form>

        </div>
    </div>
</div>
</div>

<?php include('hf-tamplet/footer.php'); ?>
<script type="text/javascript">
// Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
//window.addEventListener('click', outsideClick);

// Open
function openModal() {
    modal.style.display = 'block';
}

// Close
function closeModal() {
    modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

</html>