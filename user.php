<?php
include "connect.php";
$user_age = 30; 
$user_gender = 'male'; 
$user_caste = 'mbc';
$user_professions = 'government';
$sql = "SELECT * FROM scheme WHERE (Min_age <= $user_age AND Max_age >= $user_age) AND gender = '$user_gender' AND Caste = '$user_caste' AND  profession Like '%$user_professions%'";
$sql2 = "SELECT * FROM scheme Where caste = '$user_caste' and type = 2";
$sql3 = "SELECT * FROM scheme Where gender = '$user_gender' and type = 2";
$sql3 = "SELECT * FROM scheme Where profession like '%$user_professions%' and type = 2";
$sql4 = "SELECT * FROM scheme Where (Min_age <= $user_age AND Max_age >= $user_age) and type = 2";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row["Title"] . "</h3>";
        echo "<p>" . $row["Desciption"] . "</p>";
        echo "<a href='" . $row["Link"] . "'>More Details</a>";
        echo "</div>";
    }
} else {
    echo "No schemes available for this user.";
}
$con->close();
?>
<!-- 


Executive analysis  


 -->