<?php
include('connection/connection_database.php');

 $sql ="SELECT fname,phoneNumber,bloodGroup FROM request";
      $result =mysqli_query($conn,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          $name=$row['fname'];
          $number=$row['phoneNumber'];
          $blood=$row['bloodGroup'];
        //  $message=$row['message'];

$data="<table><tr><td>Respected donors,</td></tr>
<tr><td>This is a request from blood donation system A person is searching blood. it's an emergency so if u can help please contact on following details</td></tr>
<tr><td>Name:$name</td></tr><tr><td>Blood Group:$blood</td></tr>
<tr><td>number:$number</td></tr>
</table>";
}
}
//send_mail
if(isset($_POST['email_data']))
{	foreach($_POST['email_data'] as $row)
	{
include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="blooddonationsystem73@gmail.com";
	$mail->Password="quomodvgnovoaldw";
	$mail->SetFrom("blooddonationsystem73@gmail.com");
	$mail->addAddress($row["email"]);
	$mail->IsHTML(true);
	$mail->Subject="Help needed";
	$mail->Body=$data;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "Mail send";
	}else{
		echo "Error occur";
	}

    }
}

?>