<!DOCTYPE html>
<head>

    <title>Pan AirWays Official | Log In</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/loginStyles.css">
        
</head>

<body>
    <header>
        <img src="img/logo.png" class="logo" width="100" height="100">
        <a href="home.php"><img src="img/name.png" class="logo" width="250" height="100"></a>

        <div id="login"><a class="login" href="login.php">Log In</a> | <a class="login" href="register.php">Sign Up</a></div>

    </header>

    <ul class="navbar">
        <li class="nav"><a class="active" href="home.php">Home</a></li>
        <li class="nav"><a href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a href="contact.php">Contact Us</a></li>
        <li class="nav"><a href="profile.php">User Profile</a></li>
    </ul>

    <br><br><br>

    <div class="loginbox">
        <form method="POST" action="loginprocess.php">

            <div id="loginheader">Log in</div><br><br>
            
            <label for="username">Enter username: </label><br>
            <input class="textbox" type="text" name="username" required><br><br>
            <label for="password">Enter password: </label><br>
            <input class="textbox" type="password" name="password" required><br><br><br>

            <center><input class="button" type="submit" value="Log in" name="login"></center><br><br>

            <label>Not yet signed up?</label>
            <a class="loginlink" href="register.php">Sign Up</a>
        </form>
    </div>    

    <br><br><br>
    

    <footer>
        <div class="footer">
        <div class="quicklinks">
        <h4 class="qlh">Quick Links</h4>
        <ul class="footerlinks">
            <li><a href="contact.php">Contact Us</a></li>
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