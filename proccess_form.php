<?php
   //$_SERVER["REQUEST_METHOD"] == "POST"

   if($_SERVER["REQUEST_METHOD"] == "POST") {
        $cname = $_POST["cname"];

        if(empty($cname)){
            // Data Validated
            // Save to the database now
        }
   }
?>