<?php
    //linking configuration file
    require_once 'config.php';

    session_start();

    if (isset($_SESSION['loggedInUser'])) {
        $username = $_SESSION['loggedInUser'];

        $sql = "SELECT username, name, email, address, country, dob, flightMiles FROM registeredUser";

        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['username'] == $username) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $country = $row['country'];
                    $dob = $row['dob'];
                    $flightMiles = $row['flightMiles']; 
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

    <div class="pagebody">

        <h2>User Profile</h2>

        <ul class="navbar" style="background-color:#bcadd4;">
            <li class="nav"><a href="viewBookings_current.php" style="color:#332157;">Current Bookings</a></li>
            <li class="nav"><a href="viewBookings_old.php" style="color:#332157;">Previous Bookings</a></li>
            <li class="nav"><a href="reserve.php" style="color:#332157;">New Booking</a></li>
            <li class="nav"><a href="postInquiry.php" style="color:#332157;">Post Inquiry</a></li>
        </ul>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <h3>Change User Profile</h3>
                            
            <label for="username">Username</label><br><br>
            <input type="text" class="textbox" name="username" value="<?php echo $username ?>" readonly><br><br><br>

            <label for="email">E-mail</label><br><br>
            <input type="text" class="textbox" name="email" value="<?php echo $email ?>"><br><br><br>

            <label for="name">Name</label><br><br>
            <input type="text" class="textbox" name="name" value="<?php echo $name ?>"><br><br><br>

            <label for="address">Mailing Address</label><br><br>
            <input type="text" class="textbox" name="address" value="<?php echo $address ?>"><br><br><br>

            <label for="country">Country of Citizenship</label><br><br>
            <input type="text" class="textbox" name="country" value="<?php echo $country ?>"><br><br><br>

            <label for="dob">Date of Birth</label><br><br>
            <input type="date" class="datebox" name="dob" value="<?php echo $dob ?>"><br><br><br>
                
            <input class="button" type="submit" value="Change Password" name="changepw"><span class="tab"></span>
            <input class="button" type="submit" value="Update Details" name="update"><span class="tab"></span>
            <input class="button" type="submit" value="Delete Account" name="deleteacc"><br>
             
        </form>   
    </div>

    <?php
        if (isset($_POST['update'])) {
            $name_new = $_POST['name'];
            $email_new = $_POST['email'];
            $address_new = $_POST['address'];
            $country_new = $_POST['country'];
            $dob_new = $_POST['dob'];

            $sql1 = "UPDATE registeredUser SET  name = '$name_new', email = '$email_new', address = '$address_new', country = '$country_new', dob = '$dob_new' WHERE username = '$username'";

            $data = $con->query($sql1);

            if ($data) {
                echo "<script>alert('Account details updated successfully')</script>";                
            }
            else {
                echo "<script>alert('Account details updation failed')</script>";
            }
            echo "<script> location.href='profile.php'; </script>";
        }

        if (isset($_POST['deleteacc'])) {
            header("location:deleteAccount.php");
        }

        if (isset($_POST['changepw'])) {
            header("location:changePassword.php");
        }


        $con->close();

    ?>

    <br><br>

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