<?php
$host="localhost";
$user="root";
$password="";
$db="reviews"; 
$con=mysqli_connect($host,$user,$password,$db);

if($con){
    echo "";
}
else{
    echo "Db not connected";
}
?>