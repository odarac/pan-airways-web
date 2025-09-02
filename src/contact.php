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
    
    $con->close();
?>

<!DOCTYPE html>
<head>
    <title>Pan AirWays Official | Contact Us</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/loggedUserStyles.css">
    <link rel="stylesheet" href="../styles./loginStyles.css">

    <style>
        #contacttable {
            border-collapse: collapse;
            width: 60%;
            color: #332157;
            border-spacing: 20px;            
        }

        #contacttable td {
            border: 1px solid #332157;            
            padding: 10px;
        }

        #contacttype {
            background-color:#9a80c7;
        }
        #contactvalue {
            background-color:#bcadd4;
        }
    </style>
    
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
        <li class="nav"><a href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a class="active" href="contact.php">Contact Us</a></li>
        <li class="nav"><a href="profile.php">User Profile</a></li>
    </ul>

    <br><br>

    <div class="pagebody">
        <h2>Contact Us</h2>

        <p>If you are facing any issues or have any queries, please first take a look at our FAQs available for you below.<br> For urgent help or if you are flying within 72 hours, contact us using the information provided below.</p>
        
        <table id="contacttable">
            <tr>
                <td id="contacttype">E-mail</td>
                <td id="contactvalue">generalhelpline@panairways.com</td>
            </tr>
            <tr>
                <td id="contacttype">Mobile</td>
                <td id="contactvalue">+65-101-101-00</td>
            </tr>
        </table>

        <h2>Frequently Asked Questions</h2>

        <p><b>Can I make changes to a booking made through a travel agent or partner airline through the PanAirWays Official Reservation System?</b><br>For bookings made with a travel agent or partner airline, please contact them directly to make any changes.</p>
        <p><b>Can I book flights to destinations not provided in the PanAirWays Official Reservation System?</b><br>Unfortunately, no. Our services are not extended to those regions beyond those provided by the systems.</p>
        <p><b>Can I transfer my flightMiles from before the PanAirWays Official Reservation System was introduced?</b><br>Yes. Please post an inquiry through your user account providing details of your previous account. We will need to confirm details of your identity.</p>

        <h2>Inquiry</h2>

        <?php

            if (isset($_SESSION['loggedInUser'])) {
                echo "<br><a href='postInquiry.php' class='button' style='text-decoration:none;'>Post Inquiry</a>";
            }
            else {
                echo "<p>Please <a href='login.php' class='loginlink'>log in</a> to post an inquiry</p>";
            }

        ?>

        <br><br>

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