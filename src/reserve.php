<?php
    //linking configuration file
    require_once 'config.php';

    session_start();

    if (isset($_SESSION['loggedInUser'])) {
        $username = $_SESSION['loggedInUser'];

        $sql = "SELECT username, name FROM registeredUser";

        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["username"] == $username) {
                    $name = $row['name'];
                }                           
            }
        }
    }
?>

<!DOCTYPE html>
<head>
    <title>Pan AirWays Official | Home</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles./loginStyles.css">
    <link rel="stylesheet" href="../styles./loggedUserStyles.css">
    
</head>

<body>
    <header>
        <img src="img/logo.png" class="logo" width="100" height="100">
        <a href="home.php"><img src="img/name.png" class="logo" width="250" height="100"></a>

        <?php

            if (isset($_SESSION['loggedInUser'])) {
                echo "<div class='session_header'><div id='welcome'>Welcome, $name</div><div id='logout'><a class='login' href='logout.php'>Log Out</a></div></div>";
            }
            else {
                echo "<div id='login'><a class='login' href='login.php'>Log In</a> | <a class='login' href='register.php'>Sign Up</a></div>";
            }

        ?>

    </header>

    <ul class="navbar">
        <li class="nav"><a href="home.php">Home</a></li>
        <li class="nav"><a class="active" href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a href="contact.php">Contact Us</a></li>
        <li class="nav"><a href="profile.php">User Profile</a></li>
    </ul>

    <br><br>

    <div class="pagebody">
        <h2>Make a Reservation</h2>

        <form method="POST" action="viewFlights.php">

            <label for="from">From:</label><br>

            <select class="select-form" id="from" name="from" required>
                <option value="">Select country</option>
                <?php 
                    $sql1 = "SELECT airportCode, country FROM airport";

                    $result = $con->query($sql1);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $airportcode = $row['airportCode'];
                            $country = $row['country'];

                            echo "<option value='$airportcode'>$airportcode, $country</option>";
                        }
                    }
                ?>
            </select><br><br><br>

            <label for="to">To:</label><br>
            <select class="select-form" id="to" name="to" required>
                <option value="">Select country</option>
                <?php
                    $result = $con->query($sql1);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $airportcode = $row['airportCode'];
                            $country = $row['country'];

                            echo "<option value='$airportcode'>$airportcode, $country</option>";
                        }
                    }
                ?>
            </select><br><br><br>

            <label for="dep_date">Departure Date:</label><br>
            <input class="datebox" type="date" name="dep_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date('Y-m-d', strtotime('+12 months')); ?>" required><br><br><br>
            
            <label for="passenger">Number of Passengers:</label><br>
            <select class="select-form" id="passenger" name="passenger" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br><br><br>

            <label for="class">Class:</label><br>
            <select class="select-form" id="class" name="class" required>
                <option value="economy">Economy</option>
                <option value="business">Business</option>
                <option value="first">First</option>
            </select><br><br><br>

            <center><input class="button" type="submit" name="viewflight" value="View Flights"></center><br><br>
        </form>

    </div>

    <br><br>

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