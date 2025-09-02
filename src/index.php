<?php
    
?>

<!DOCTYPE html>
<head>
    <title>Pan AirWays Official | Home</title>
    <link rel="stylesheet" href="../styles/styles.css">

    <style>

        #img1 {
        width: 100%;
        opacity: 70%;
        }

        div.img {
            position: relative;
            text-align: left;
        }

        .img-link {
            position: absolute;
            top: 10%;
            left: 15%;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .img-text {
            position: absolute;
            bottom: 10%;
            left: 5%;
            font-size: 40px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:#e6e6dd;
        }

        .imglink {
	        text-decoration: none;
            font-size: 64px;
            color:#e6e6dd;
        }

        .imglink a:hover {
            color:#e6362a;
        }

    </style>

    
</head>

<body>
    <header>
        <img src="img/logo.png" class="logo" width="100" height="100">
        <a href="home.php"><img src="img/name.png" class="logo" width="250" height="100"></a>

        <div id="login"><a class="login" href="login.php">Log In</a> | <a class="login" href="register.php">Sign Up</a></div>

    </header>

    <ul class="navbar">
        <li class="nav"><a class="active" href="index.php">Home</a></li>
        <li class="nav"><a href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a href="contact.php">Contact Us</a></li>
        <li class="nav"><a href="login.php">User Profile</a></li>
    </ul>

    <div class="img">
        <img id="img1" src="img/plane1.png"> 
        <div class="img-link"><a class="imglink" href="reserve.php">Welcome aboard</a></div>
        <div class="img-text">Experience a world of comfort and elegance like never before. <br>Because you deserve to fly better.</div>
    </div>

    <footer>
        <div class="footer">
        <div class="quicklinks">
        <h4 class="qlh">Quick Links</h4>
        <ul class="footerlinks">
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Terms and Conditions</a></li>
        </ul>
        </div>

        <div class="sns" align="right">
            <h4 style="padding-right: 40px;">Connect with us</h4> <span class="tab"></span>
            <a href="https://www.facebook.com/"><img class="sns" src="img/facebook.png" width="40" height="40"></a> <span class="tab"></span>
            <a href="https://www.instagram.com/"><img class="sns" src="img/instagram.png" width="40" height="40"></a> <span class="tab"></span>
            <a href="https://twitter.com/?lang=en"><img class="sns" src="img/twitter.png" width="40" height="40"></a> <span class="tab"></span>
        </div> 
        </div>

    </footer>

</body>