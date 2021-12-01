<?php 
     header_remove();
     header('location:hikes.php');

include "db-connect.php";
 $id = $_GET['id'];
 print_r($id);
 $querydel = "DELETE FROM DATA WHERE id=$id";
 $requestdelete = $conn->prepare($querydel);
 $requestdelete->execute();
 if($requestdelete){
     $conn = null;
 exit;
 }
?>