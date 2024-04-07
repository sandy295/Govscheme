<?php
include "connect.php";
$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$caste = $_POST["caste"];
$profession = $_POST["profession"];
$address = $_POST["address"];
$sql = "INSERT INTO users (name, gender, age,profession, address,caste) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssisss", $name, $gender, $age,$profession, $address,$caste);
$stmt->execute();
$stmt->close();
$con->close();
header("Location: view.html");
exit();
?>