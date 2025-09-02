<?php
    //the connection object
    $con = new mysqli("localhost", "root", "", "panairwaysdb", port:2306);
    //I had to change the default port number in MySQL from 3306 to 2306 due to an error from blocked ports.

    //check the connection
    if ($con ->connect_error) {
        die("Connection failed: ".$con ->connect_error);
    }
