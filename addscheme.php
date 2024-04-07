<?php
include 'connect.php';
 if(isset($_POST['submit'])){
    // $name = $_POST['name'];
    // $dep = $_POST['dept'];
    // $description = $_POST['description'];
    // $query = "insert into `schemes` (Name,Dept,Description) 
    // values('$name','$dep','$description')"; 
    // $res = mysqli_query($con,$query);
    $name = $_POST["name"];
    $description = $_POST['description'];
    $gender = $_POST["gender"];
    $minAge = $_POST["minAge"];
    $maxAge = $_POST["maxAge"];
    $caste = $_POST["caste"];
    $type = $_POST['type'];
    $professions = implode(",", $_POST["profession"]); // Convert array to comma-separated string
    $link = $_POST["link"];
    $category = $_POST['category'];
    // Prepare SQL statement
    $query = "INSERT INTO `scheme` (Title,Desciption,Gender,Min_age,Max_age,Caste,Profession,Link,type,category) VALUES ('$name','$description','$gender ', '$minAge','$maxAge','$caste',' $professions','$link','$type','$category')";
    $res = mysqli_query($con,$query);
    if($res){
        echo 'sucees';
    }
    else{
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Your Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>" href="/Mini-project/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage === 'manage' ? 'active' : ''; ?>" href="/Mini-project/displayscheme.php">Manage</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 <div class="header">
 <h1 style="text-align: center;">Add SCHEMA</h1><br><br>
 </div>
<div class="container">
  <form method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Gender:</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
        <label class="form-check-label" for="male">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
        <label class="form-check-label" for="female">Female</label>
      </div>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Age (Minimum - Maximum):</label>
      <div class="row">
        <div class="col">
          <input type="number" class="form-control" id="minAge" name="minAge" placeholder="Minimum Age">
        </div>
        <div class="col">
          <input type="number" class="form-control" id="maxAge" name="maxAge" placeholder="Maximum Age">
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label for="caste" class="form-label">Caste:</label>
      <select class="form-select" id="caste" name="caste">
        <option value="bc">BC</option>
        <option value="mbc">MBC</option>
        <option value="sc">SC</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Profession:</label><br>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="agriculture" id="agriculture" name="profession[]">
        <label class="form-check-label" for="agriculture">Agriculture</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="government" id="government" name="profession[]">
        <label class="form-check-label" for="government">Government</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="handloom" id="handloom" name="profession[]">
        <label class="form-check-label" for="handloom">Handloom</label>
      </div>
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="student" id="student" name="profession[]">
        <label class="form-check-label" for="handloom">Student</label>
      </div>
    </div>
    <div class="mb-3">
      <label for="link" class="form-label">Link:</label>
      <input type="text" class="form-control" id="link" name="link">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
      <label for="type" class="form-label">Type:</label>
          <input type="number" class="form-control" id="type" name="type" placeholder="Scheme Type">
    </div>

    <div class="form-group">
        <label for="categorySelect">Select Category:</label>
        <select class="form-control" id="categorySelect" name="category">
          <option value="social">Social</option>
          <option value="farm">Farm</option>
          <option value="general">General</option>
          <option value="business">Business</option>
          <option value="women">Women</option>
          <option value="education">Education</option>
        </select>
      </div>
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
  </form>
</div>

</body>
</html>