<?php
    include "dbconnection.php";

    if($_SERVER["REQUEST_METHOD"] == "DELETE"){
        $id = $_GET["id"];
        $sql = "DELETE FROM `tbl_users` WHERE id = $id";
        $conn->query($sql);
        echo json_encode(["status" => "success"]);
    }
?>