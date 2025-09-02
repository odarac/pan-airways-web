<?php
    //linking configuration file
    require_once 'config.php';

    session_start();

    if (isset($_SESSION['loggedInUser'])) {
        $username = $_SESSION['loggedInUser'];

        $sql = "SELECT username, password, name FROM registeredUser";

        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['username'] == $username) {
                    $name = $row['name'];
                    $oldpw = $row['password'];                     
                }                  
            }
        }
    }
    else {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<head>
    <title>Pan AirWays Official | User Profile</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/loggedUserStyles.css">
    <link rel="stylesheet" href="../styles./loginStyles.css">

    <style>
        .validate {
            color: #f07e67;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <header>
        <img src="img/logo.png" class="logo" width="100" height="100">
        <a href="home.php"><img src="img/name.png" class="logo" width="250" height="100"></a>

        <div class="session_header">
            <div id="welcome">Welcome, <?php echo $name ?></div>
            <div id="logout"><a class="login" href="logout.php">Log Out</a></div>
        </div>

    </header>

    <ul class="navbar">
        <li class="nav"><a href="home.php">Home</a></li>
        <li class="nav"><a href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a href="contact.php">Contact Us</a></li>
        <li class="nav"><a class="active" href="profile.php">User Profile</a></li>
    </ul>
    <br><br>

    <div class="loginbox">

        <h2>Change Password</h2><br>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            
            <label for="username">Username</label><br><br>
            <input type="text" class="textbox" name="username" value="<?php echo $username ?>" readonly><br><br><br>

            <label for="oldpassword">Enter Previous Password:</label><br>
            <input class="textbox" type="password" name="oldpassword" required><br><br><br>

            <label for="newpassword">Enter New Password: </label><br>
            <input class="textbox" type="password" id="pw" name="newpassword" oninput="checkPassword()" required><br>
            <p class="validate" id="pwcheck1"></p>
            <p class="validate" id="pwcheck2"></p>
            <p class="validate" id="pwcheck3"></p>
            <p class="validate" id="pwcheck4"></p><br>

            <label for="repassword">Re-enter New Password: </label><br>
            <input class="textbox" type="password" id="repw" name="repassword" oninput="checkRepw()" required><br>
            <p class="validate" id="repwcheck"></p>
            <p>Password must be 8-20 characters and must contain at least one uppercase letter, one lowercase letter and one letter.</p><br><br><br>

            <input class="button" type="submit" value="Change Password" name="changepw">

             
        </form>   
    </div>

    <?php
        if (isset($_POST['changepw'])) {
            $oldpwinput = $_POST['oldpassword'];
            $newpw = $_POST['newpassword'];
            $repw = $_POST['repassword'];

            if ($oldpwinput == $oldpw) {
                $sql1 = "UPDATE registeredUser SET password = '$newpw' WHERE username = '$username'";

                $data = $con->query($sql1);

                if ($data) {
                    echo "<script>alert('Password Changed Successfully. Log in again');</script>";
                    echo "<script> location.href='logout.php'; </script>";
                }
                else {
                    echo "<script>alert('Password change failed');</script>";
                }
                                
            }
            else {
                echo "<script>alert('Invalid Password Entered');</script>";
            }
        }

        $con->close();

    ?>

    <br><br>

    <script src="../js/validation.js"></script>

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
