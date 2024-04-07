<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $caste = $_POST["caste"];
    $age = $_POST["age"];
    $profession = $_POST["profession"];


    $username = $_SESSION["username"];
    $sql = "UPDATE users SET  name = '$name', gender = '$gender', caste = '$caste', age = '$age', profession = '$profession' WHERE username = '$username'";
    if ($con->query($sql) === TRUE) {
     
        header("Location: profile.php");
        exit();
    } else {
       
        $error_message = "Error: " . $con->error;
    }
}


$username = $_SESSION["username"];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_details = array(
        'username' => $row['username'],
        'name' => $row['name'],
        'gender' => $row['gender'],
        'caste' => $row['caste'],
        'age'   => $row['age'],
        'profession' => $row['profession']
    );
} else {
    // Handle the case where user details are not found
    $error_message = "User not found";
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript -->
    <script>
        function enableEdit() {
          
            document.getElementById("name").readOnly = false;
            document.getElementById("gender").readOnly = false;
            document.getElementById("caste").readOnly = false;
            document.getElementById("age").readOnly = false;
            document.getElementById("profession").readOnly = false;
            document.getElementById("editButton").style.display = "none";
            document.getElementById("saveButton").style.display = "block";
            document.getElementById("cancelButton").style.display = "block";
        }

        function disableEdit() {
           
            document.getElementById("name").readOnly = true;
            document.getElementById("gender").readOnly = true;
            document.getElementById("caste").readOnly = true;
            document.getElementById("age").readOnly = true;
            document.getElementById("profession").readOnly = true;
            document.getElementById("editButton").style.display = "block";
            document.getElementById("saveButton").style.display = "none";
            document.getElementById("cancelButton").style.display = "none";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_details['username']; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_details['name']; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $user_details['gender']; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="caste">Caste:</label>
                <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $user_details['caste']; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $user_details['age']; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="profession">Profession:</label>
                <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $user_details['profession']; ?>" readonly required>
            </div>
            <?php if(isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <button type="button" id="editButton" class="btn btn-primary" onclick="enableEdit()">Edit</button>
            <button type="submit" id="saveButton" class="btn btn-success" style="display: none;">Save Changes</button>
            <button type="button" id="cancelButton" class="btn btn-secondary" style="display: none;" onclick="disableEdit()">Cancel</button>
            <a href="landing.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>
