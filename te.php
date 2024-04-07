<?php
    $username = 'sandy';
    include 'connect.php';
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
         $userAge = $row['age'];
         $userGender = $row['gender'];
         $userProfession = $row['profession'];
         $userCaste = $row['caste'];
      }
   }else {
      echo "No records found";
    }
?>