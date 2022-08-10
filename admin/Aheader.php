<!DOCTYPE html>
<html>

<head>
    <title>Blood Donation System</title>

    <style type="text/css">
    body {
        font-family: 'Open Sans', sans-serif;
        minwidth: 100%;
        height: auto;
        margin: 0 auto;
        background: white;
    }

    .admin-sidebar {
        background: #101010;
        width: 180px;
        height: 100%;
        position: fixed;
        z-index: -1;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        z-index: 1000;
    }

    .admin-header {
        background: #101010;
        padding: 15px 16px;
    }

    .header-greet {
        display: inline-block;
        float: right;
    }

    h3 {
        margin: 0;
        display: inline-block;
        color: ;
    }

    .header-text {
        color: #999;
    }

    .logout-btn {
        padding: 18px 16px;
        color: #999;
        background: #4444;
        box-shadow: 0px 0px 4px rgba(0, 0, 0) inset;
    }

    li {
        list-style-type: none;
        padding: 15px;
        border-bottom: 0.5px solid black;
    }

    li:hover {
        list-style-type: none;
        padding: 15px;
        background: #151515;
        border-bottom: 0.5px solid black;
        box-shadow: 0px 0px 4px rgba(0, 0, 0) inset;
    }

    a {
        text-decoration: none;
        color: #999;
    }

    a:hover {
        color: red;
    }

    #foot {
        background-color: black;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 2.5rem;
        /* Footer height */
    }

    .footer-content {
        max-width: 500px;
        margin: 10px auto;
        line-height: 28px;
        color: #cacdd2;
    }
    </style>
</head>

<body>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class='all'>

        <div class='admin-header'>
            <div class='header-text'>
                <h3>Admin Panel </h3>

                <div class='header-greet'>
                    <span><i class="fa">&#xf007;</i> <?php echo  $_SESSION['userName'] ?></span>
                    <button class=' btn btn-danger'> <a href='logout.php'><i class="fa">&#xf011;</i>logout</a></button>

                </div>

            </div>
        </div>


        <div class='admin-sidebar'>



            <li> <a href='dashbord.php'><i class="fa">&#xf0e4;</i> Dashboard</a> </li>

            <li> <a href='display.php'><i class="fa">&#xf0c0;</i> Manage Doners</a> </li>

            <li> <a href='request.php'><i class="fa">&#xf055;</i>Blood Requests</a></li>

            <li> <a href='msgTodonor.php'><i class="fa fa-envelope"></i>Send Message</a></li>

            <li> <a href='mail.php'><i class="fa">&#xf1d9;</i> Send Request</a></li>

        </div>