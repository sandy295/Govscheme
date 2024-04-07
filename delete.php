<?php 
include 'connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "delete from `scheme` where id=$id";
    $res = mysqli_query($con,$sql);
    if($res){
        header('location:index.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>