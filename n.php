<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is different
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $description = $_POST['description'];
    $gender = $_POST["gender"];
    $minAge = $_POST["minAge"];
    $maxAge = $_POST["maxAge"];
    $caste = $_POST["caste"];
    $professions = implode(",", $_POST["profession"]); // Convert array to comma-separated string
    $link = $_POST["link"];
    // Prepare SQL statement
    $sql = "INSERT INTO `schemes` (Title,Description,Gender,Min_age,Max_age,Caste,Profession,Link) VALUES ('$name','$description','$gender ', '$minAge','$maxAge','$caste',' $professions','$link')";
    // $query = "insert into `schemes` (Name,Dept,Description) 
    // values('$name','$dep','$description')"; 
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiiss", $name, $gender, $minAge, $maxAge, $caste, $professions, $link);
    
    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
