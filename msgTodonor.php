<?php
session_start();
if(!isset($_SESSION['userName'])){
    header('location:login.php');  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Blood Donation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style> .container{ padding-left:10em;}   </style>

</head>
<?php include('admin/Aheader.php'); ?>
<div class="container">
    <br>
    <h3>Enter subject and messages and send to all registered donors </h3>
    <div class="col-md-9">
        <form method="post" id="frm">
            <div class="contact-form">
                <div class="form-group">
                    <label class="control-label col-sm-2">Subject:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter subject" name="subject"
                            required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2">Message:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
                        <span style="color:red;" id="msg"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>  
</div>
   

    <script>
    jQuery('#frm').on('submit', function(e) {
        jQuery('#msg').html('');
        jQuery('#submit').html('Please wait');
        jQuery('#submit').attr('disabled', true);
        jQuery.ajax({
            url: 'submit.php',
            type: 'post',
            data: jQuery('#frm').serialize(),
            success: function(result) {
                jQuery('#msg').html(result);
                jQuery('#submit').html('Submit');
                jQuery('#submit').attr('disabled', false);
                jQuery('#frm')[0].reset();
            }
        });
        e.preventDefault();
    });
    </script>
<?php include('admin/Afooter.php'); ?>

</html>