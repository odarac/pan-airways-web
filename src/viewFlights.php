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

    function calcTicketPrice($dep_dt, $today, $price) {
        $interval = date_diff($today, $dep_dt);
        if ($interval->format("%R%a") < 30) {
            return $price * 1.5;
        }
        else if ($interval->format("%R%a") < 100) {
            return $price * 1.2;
        }
        else {
            return $price;
        }
    }
?>

<!DOCTYPE html>
<head>
    <title>Pan AirWays Official | Home</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles./loginStyles.css">
    <link rel="stylesheet" href="../styles./loggedUserStyles.css">

    <style>
        #flighttable {
            border-collapse: collapse;
            width: 100%;
            color: #332157;
            border-spacing: 20px;            
        }

        #flighttable td {
            background-color:#bcadd4;
            border: 1px solid #332157;            
            padding: 10px;
        }

        #flighttable th {
            background-color:#9a80c7;
            border: 1px solid #332157;            
            padding: 10px;
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
        <li class="nav"><a class="active" href="reserve.php">Flight Reservation</a></li>
        <li class="nav"><a href="contact.php">Contact Us</a></li>
        <li class="nav"><a href="profile.php">User Profile</a></li>
    </ul>

    <br><br>

    <div class="pagebody">
        <h2>View Available Flights</h2>

        <table id="flighttable">
            <tr>
                <th>Flight Type</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Booking</th>
                <th>Cost($)</th>
            </tr>
            <?php 
                if ($_POST['viewflight']) {
                    $dep_point = $_POST['from'];
                    $arrival_point = $_POST['to'];
                    $dep_date = $_POST['dep_date'];
                    $psngr_count = $_POST['passenger'];
                    $class = $_POST['class'];
                }
    
                $query = "SELECT flightNumber, dep_point, arrival_point, dep_datetime, arrival_datetime, type FROM flight 
                          WHERE dep_point = '$dep_point' and  arrival_point = '$arrival_point' and  DATE(dep_datetime) = '$dep_date'";

                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $fNo = $row['flightNumber'];
                        $dep_dt = new DateTime($row['dep_datetime']);
                        $arr_dt = new DateTime($row['arrival_datetime']);

                        $query2 = "SELECT country FROM airport WHERE airportCode = '$dep_point'";

                        $result2 = $con->query($query2);
                        if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                                $dep_country = $row2['country'];
                            }
                        }
                        else {
                            die("Error1");
                        }

                        $query3 = "SELECT country FROM airport WHERE airportCode = '$arrival_point'";

                        $result3 = $con->query($query3);
                        if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                                $arr_country = $row3['country'];
                            }
                        }
                        else {
                            die("Error2");
                        }

                        $query4 = "SELECT base_price FROM ticketcost WHERE flightNumber = '$fNo' and class = '$class'";

                        $result4 = $con->query($query4);
                        if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                $price = $row4['base_price'];
                            }
                        }
                        else {
                            die("<script>alert('Cannot reserve given flight at this time')</script>");
                        }

                        //$today = date_create(date("d-m-Y H:i:s"));
                        $today = new DateTime();
                        $cost = calcTicketPrice($dep_dt, $today, $price) * $psngr_count;
                        
                        
                        $type = $row['type'];

                        echo "<tr><td>$type</td><td> $dep_point, $dep_country ".date_format($dep_dt, "D, j M Y H:i:s")."</td><td> $arrival_point, $arr_country ".date_format($arr_dt, "D, j M Y H:i:s")."</td><td> $psngr_count passengers, in ".ucfirst($class)." </td><td> $cost </td>";
                        if (isset($_SESSION['loggedInUser'])) {
                            echo "<td><a class='loginlink' href='makeBooking.php ? flightNo=$fNo &psngr_count=$psngr_count &class=$class'>Make Booking</a></td>";
                        }   
                        echo "</tr>";                                             
                    }
                }
                else {
                    echo "<script>alert('No flights available')</script>";
                    echo "<script> location.href='reserve.php'; </script>";
                }
            ?>

        </table>
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