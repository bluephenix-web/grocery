<?php
    include "dbconnection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $request_raw = file_get_contents("php://input");
        $request = json_decode($request_raw);
        

        $sql = "INSERT INTO `tbl_users`(`username`, `password`) 
        VALUES ('$request->username','$request->password')";

        $conn->query($sql);
    }

?>