<?php
include('connection/connection_database.php');


if(isset($_POST['subject']) && isset($_POST['message'])){
	$subj=mysqli_real_escape_string($conn,$_POST['subject']);
	$message=mysqli_real_escape_string($conn,$_POST['message']);
	mysqli_query($conn,"insert into messages(subject,message) values('$subj','$message')");  
	
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

	$sql ="SELECT email FROM doners";
	$result =mysqli_query($conn,$sql);
	if($result){

	$mail->AddReplyTo("blooddonationsystem73@gmail.com");

	 while($em=mysqli_fetch_assoc($result)){

	 $mail->addAddress ($em['email']);

	 }
	$mail->IsHTML(true);
	$mail->Subject=$subj;
	$mail->Body=$message;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "Messag sent To all Doners";
	}else{
		echo "Error occur";
	}
  }  
}

?>
