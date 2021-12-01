<?php



$conn = new PDO('mysql:host=mysql; dbname=alpiniste' ,"root","root");

if(!$conn){
    die("fail to connect");
}
?>