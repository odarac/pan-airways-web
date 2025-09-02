<?php
    //linking configuration file
    require_once 'config.php';
?>

<?php
    if ($_POST["signup"]) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $name = $_POST["name"];
        $email =  $_POST["email"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $dob = $_POST["dob"];
        $phone = $_POST["phone"];

        

        $sql1 = "INSERT INTO registeredUser (username, password, name, email, address, country, dob) VALUES ('$username', '$password', '$name', '$email', '$address', '$country', '$dob')";

        if ($con->query($sql1)) {
            echo "<script>alert('Registration successful')</script>";

            if ($phone != "") {
                $sql2 = "INSERT INTO registereduser_phone VALUES ('$username', '$phone')";
    
                if ($con->query($sql2)) {
                    echo "<script>alert('Registration successful');</script>";
                    header("location:login.php");
                }
                else {
                    echo "<script>alert('Error in inserting Phone Number:')</script>";
                    header("location:login.php");
                }
            }
        }
        else {
            echo "<script>alert('Error in registration:')</script>";
            header("location:index.php");
        }      
               
        
    }
        
    //close the connection
    $con -> close();
?>