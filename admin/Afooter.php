
<footer id="foot"><p class="footer-content"> &copy All Rights Reserve To Blood Donation System</p> </footer>

<!-- for alert messages -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status']!='')
{
?>
<script>
swal({
    title: "<?php  echo $_SESSION['status'] ?>",
    //text: "You clicked the button!",
    icon: "<?php  echo $_SESSION['status_code'] ?>",
    button: "ok",
});
</script>
<?php
unset($_SESSION['status'] );
}


?>
</body>