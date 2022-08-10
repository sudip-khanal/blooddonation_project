<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Blood Donation</title>
    <style>
    @media (min-width: 769px) {

        .header,
        .main-nav {
            display: flex;
        }

        .header {
            flex-direction: column;
            align-items: center;

            .header {
                width: 80%;
                margin: 0 auto;
                max-width: 1150px;
            }
        }

    }

    @media (min-width: 1025px) {
        .header {
            flex-direction: row;
            justify-content: space-between;
        }

    }

    /* * {
  box-sizing: border-box;
} */
    body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
        margin: 0;
        min-height: 100vh;
        background-color: ;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }


    h2,
    h3,
    a {
        color: #34495e;
    }

    a {
        text-decoration: none;
    }



    .logo {
        margin: 0;
        font-size: 1.45em;
    }

    .main-nav {
        margin-top: 5px;

    }

    .logo a,
    .main-nav a {
        padding: 10px 15px;
        text-transform: uppercase;
        text-align: center;
        display: block;
    }

    .main-nav a {
        color: #34495e;
        font-size: .99em;
    }

    .main-nav a:hover {
        color: #718daa;

    }

    .header {
        padding-top: .5em;
        padding-bottom: .5em;
        border: 1px solid #a2a2a2;
        background-color: #f4f4f4;
        -webkit-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: auto;
        width: 100vw;
        text-align: center
    }

    .foot {
        background-color: black;

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

    <header class="header">

        <h1 class="logo"><a href="home.php">blood donation system</a></h1>
        <ul class="main-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="donerValidation.php">Be a donor</a></li>
            <li><a href="search.php">donor list</a></li>
            <li><a href="Brequest.php">requests</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </header>