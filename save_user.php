<?php
    include "dbconnection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $request_raw = file_get_contents("php://input");
        $request = json_decode($request_raw);
        // admin12345phenix
        // 12345phenix
        $password = $request->password . "phenix";
        $cipher = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `tbl_users`(`username`, `password`) 
        VALUES ('$request->username','$cipher')";

        $conn->query($sql);

        // // DECRYPTION for login
        // // 12345
        // $password = $request->password . "phenix"; // salt
        // $decrypted_password = password_verify($password, $cipher);
    }

?>