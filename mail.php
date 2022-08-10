<?php
session_start();
if(!isset($_SESSION['userName'])){
    header('location:login.php');  
}
?>

<?php
include('connection/connection_database.php');
$query = "SELECT id,firstName,lastName,blood_group,email FROM doners";

             $result = mysqli_query($conn,$query);

             if($result){
              while($row=mysqli_fetch_assoc($result)){       
                $id=$row['id'];
                $firstName=$row['firstName'];
                $lastName =$row['lastName'];
                $blood_group =$row['blood_group'];
                $emailId=$row['email'];
            }
        }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Blood Donation System</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style> .container{ padding-left:10em;}   </style>

</head>
<?php include('admin/Aheader.php'); ?>

<div container>
<button class="button"><a href="dashbord.php">Back To Dashbord</a></button>
    <br />
    <div class="container">
        <h3 align="center">Send Request Mail To Donors </h3>
        <br />
        <div class="table-responsive">
        <table class="table table-bordered  table-hover">
                <tr>
                    <th> ID</th>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>Select</th>
                    <th>Action</th>
                </tr>
                <?php
				$count = 0;
				foreach($result as $row)
				{
					$count = $count + 1;
					echo '
					<tr>
                    <td>'.$row["id"].'</td>
						<td>'.$row["firstName"].' '.$row["lastName"].'</td>
						<td>'.$row["email"].'</td>
                        <td>'.$row["blood_group"].'</td>
						<td>
                        <input type="checkbox" name="single_select" class="single_select" data-email="'.$row["email"].'" />
						</td>
						<td>
						<button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["email"].'" data-action="single">Send </button>
						</td>
					</tr>
					';
				}
				?>
                <!-- <tr>
                    <td colspan="5"></td>
                    <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>

                </tr> -->
            </table>
        </div>
    </div>



</div>
   
<?php include('admin/Afooter.php'); ?>
</html>

<script>
$(document).ready(function() {
    $('.email_button').click(function() {
        $(this).attr('disabled', 'disabled');
        var id = $(this).attr("id");
        var action = $(this).data("action");
        var email_data = [];
        if (action == 'single') {
            email_data.push({
                email: $(this).data("email"),
                name: $(this).data("name")
            });
        } else {
            $('.single_select').each(function() {
                if ($(this).prop("checked") == true) {
                    email_data.push({
                        email: $(this).data("email"),
                        name: $(this).data('name')
                    });
                }
            });
        }

        $.ajax({
            url: "send_mail.php",
            method: "POST",
            data: {
                email_data: email_data
            },
            beforeSend: function() {
                $('#' + id).html('Sending...');
                $('#' + id).addClass('btn-danger');
                //  $('#'+id).addClass('btn-success');
            },
            success: function(data) {
                if (data == 'mail sent') {
                    $('#' + id).text('Success');
                    $('#' + id).removeClass('btn-danger');
                    $('#' + id).removeClass('btn-info');
                    $('#' + id).addClass('btn-success');
                } else {
                    $('#' + id).text(data);
                }
                $('#' + id).attr('disabled', true);
            }
        })

    });
});
</script>