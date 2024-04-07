<?php
include 'connect.php';
$userAge = $_POST['user_age'];
$userCaste = $_POST['user_caste'];
$userProfession = $_POST['user_profession'];
$userGender = $_POST['user_gender'];

$sqlQueries = array();

$sql1 = "SELECT * FROM scheme WHERE (Min_age <= $userAge AND Max_age >= $userAge) AND gender = '$userGender' AND Caste = '$userCaste' AND profession LIKE '%$userProfession%'";
$sqlQueries[] = $sql1;

$sql2 = "SELECT * FROM scheme WHERE caste = '$userCaste' AND type = 2";
$sqlQueries[] = $sql2;

$sql3 = "SELECT * FROM scheme WHERE gender = '$userGender' AND type = 2";
$sqlQueries[] = $sql3;

$sql4 = "SELECT * FROM scheme WHERE profession LIKE '%$userProfession%' AND type = 2";
$sqlQueries[] = $sql4;

$sql5 = "SELECT * FROM scheme WHERE (Min_age <= $userAge AND Max_age >= $userAge) AND type = 2";
$sqlQueries[] = $sql5;

$schemes = array();
foreach ($sqlQueries as $sql) {
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $schemes[] = $row;
        }
    }
}


$response = array(
    "user_details" => array(
        "age" => $userAge,
        "caste" => $userCaste,
        "profession" => $userProfession,
        "gender" => $userGender
    ),
    "schemes" => $schemes
);

header('Content-Type: application/json');
echo json_encode($response);
?>
