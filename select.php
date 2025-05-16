<?php
 require("dbconnection.php");   

$sql = "SELECT * FROM tbl_users";
$result = mysqli_query($conn, $sql);
$users = [];
if($result){
    while($row = $result->fetch_assoc()){
        $users[] = $row;
    }
    echo json_encode($users);
}
?>