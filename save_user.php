<?php
    include "dbconnection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = $_POST["username"];
        $upass = $_POST["password"];

        $sql = "INSERT INTO `tbl_users`(`username`, `password`) 
        VALUES ('$uname','$upass')";

        $conn->query($sql);
    }

?>