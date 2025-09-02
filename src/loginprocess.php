<?php
    //linking configuration file
    require_once 'config.php';

    session_start();
?>

<?php
    if (isset($_POST["login"])) {
    
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT username, password FROM registeredUser WHERE username = '$username'";
        
        $result = $con->query($query);

        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                if ($row['username'] == $username) {
                    if ($row['password'] == $password) {
                        $_SESSION['loggedInUser'] = $username;
                    }
                    else {
                        echo "<script>alert('Password is incorrect')</script>";
                    }
                }
            }
        }
        else {
            echo "<script>alert('Username is incorrect')</script>";
        }
    }

    if (isset($_SESSION['loggedInUser'])) {

        echo "<script> location.href='home.php'; </script>";
    }
    
    //close the connection
    $con -> close();
?>