<?php
session_start();
if (isset($_SESSION["username"])) {
  
    $username = $_SESSION["username"];
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navigation Bar</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/efe6ffc46d.js" crossorigin="anonymous"></script>
  <style>
    
    .navbar-brand img {
      max-height: 40px; 
    }
    .navbar-nav .nav-link {
      font-size: 18px; 
    }
    .navbar-text  {
  color: rgb(232, 73, 73); 
}
.navbar-nav .nav-item {
      margin-right: 20px; 
    }
    .navbar-nav .nav-item:hover {
      background-color: rgb(118, 229, 99);
      border-radius: 10px; 
    }
    .navbar-nav .nav-item:hover .nav-link {
      color: white;
    }
    .large-text {
      font-size: 44px;
      color: rgb(44, 43, 43);
    }
    .small-text {
      font-size: 14px;
    }
    .meduim-text{
      font-size: 30px;
      color: rgb(166, 162, 162);
    }
    .green-button {
      background-color: rgb(118, 229, 99);
      color: white;
    }
    .left-column {
      text-align: center; 
      padding: 0 20px; 
      =
    }
    .carousel-item img {
      max-width: 80%; 
      height: auto; 
    }
    body {
      background-color: rgb(217, 221, 232);
    }
    .navbar {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
    }
    .white-section {
      background-color: white; 
      padding: 40px 0; 
    }
    .row.justify-content-center .card-img-top {
      max-height: 55px;
      max-width: 45px; 
      margin: 10px auto; 
    }
    .row.justify-content-center .card {
      border-radius: 15px; 
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
      margin-bottom: 20px;
      margin-left: 20px;
      transition: transform 0.5s; 
    }
    .row.justify-content-center .card:hover {
      transform: scale(1.25); 
    }
    .row.justify-content-center .card-body {
      padding: 20px;
    }
    footer {
      background-color: #333; 
      color: white;
      padding: 20px 0; 
    }
    #schemdsesContainer > .scheme > .card {
    border: 2px solid #007bff; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px; 
    padding: 20px;
    animation: fadeInUp 1s ease; 
}
.custom-card {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.card-text {
    font-size: 16px;
    color: #666;
}

@media (max-width: 768px) {
    .custom-card {
        width: 100%;
    }
}
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
    @media (max-width: 768px) {
      .left-column {
        padding: 0;
      }
      .carousel-item img {
        max-width: 100%;
        height: auto;
      }
    }

  </style>
  <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
</head>
<body>
<?php echo $username; ?>
<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light no-margin-top">
  <a class="navbar-brand" href="#">
    <img src="logo.png" alt="Logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schemes.php">Schemes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
      <span class="navbar-text" data-toggle="tooltip" data-placement="top" title="Logout">
        <a href="logout.php">
      <i class="fa-solid fa-right-from-bracket fa-2x" style="color: rgb(231, 102, 102);"></i>
      </a>
    </span>
  </div>
</nav>
</div>
<div class="container-fluid mt-5 section-background">
  <div class="row">
    <div class="col-lg-6 col-md-12 left-column mb-4 mb-lg-0">
      <h1 class="large-text">Get your Schemes with us</h1>
      <p class="small-text">Find Personalized Schemes With Your Eligibity</p>
      <button class="btn green-button" id="findSchemesBtn">Find Schemes &rightarrow;</button>
    </div>
    <div class="col-lg-6 col-md-12">
      <!-- <img src="landing.png" class="img-fluid rounded" alt="Image" style="width: 80%; height: auto;"> -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image1.png" class="d-block w-100 rounded" alt="Image 1">
          </div>
          <div class="carousel-item">
            <img src="image2.png" class="d-block w-100 rounded" alt="Image 2">
          </div>
          <div class="carousel-item">
            <img src="image3.png" class="d-block w-100 rounded" alt="Image 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

  </div>
</div>
<div style="height: 100px; width: 100%;"></div>
<div class="container-fluid white-section" id="schemes">
<div class="container mt-5">
    <div id="schemesContainer" ></div>
</div>
  <h2 class="text-center meduim-text">Categories</h2>
  <p class="text-center small-text">Find Schemes according to Categories</p>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-2 mb-3">
      <div class="card text-center">
        <img src="icon1.png" class="card-img-top" alt="Image 1">
        <div class="card-body">
          <h5 class="card-title"><a class="card-text" href='schemes.php?category=social'>Social and welfare & Caste</a></h5>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-2 mb-3">
      <div class="card text-center">
        <img src="icon2.png" class="card-img-top" alt="Image 2">
        <div class="card-body">
          <h5 class="card-title"><a class="card-text" href='schemes.php?category=business'>Business and manufactures</a></h5>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-2 mb-3">
      <div class="card text-center">
        <img src="icon3.png" class="card-img-top" alt="Image 3">
        <div class="card-body">
          <h5 class="card-title"><a class="card-text" href='schemes.php?category=women'>Women and children </a></h5>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-2 mb-3">
      <div class="card text-center">
        <img src="icon4.png" class="card-img-top" alt="Image 4">
        <div class="card-body">
          <h5 class="card-title"><a class="card-text" href='schemes.php?category=education'>Education and Student</a></h5>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-2 mb-3">
      <div class="card text-center">
        <img src="icon5.png" class="card-img-top" alt="Image 5">
        <div class="card-body">
          <h5 class="card-title"><a class="card-text" href='schemes.php?category=farm'>Farming and Rural Developement</a></h5>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="text-center" id="contact">
  <p>&copy; 2023  Contact US : info@srec.ac.in</p>
</footer>

<div id="userDetailsContainer">

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById("findSchemesBtn").addEventListener("click", function() {

     <?php
  
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


    var userAge = <?php echo $userAge?>;
    var userCaste = '<?php echo $userCaste?>';
    var userProfession = '<?php echo $userProfession?>';
    var userGender =  '<?php echo $userGender?>'; 
    var formData = new FormData();
    formData.append("user_age", userAge);
    formData.append("user_caste", userCaste);
    formData.append("user_profession", userProfession);
    formData.append("user_gender", userGender); 
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_schemes.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response);
            var userDetails = response.user_details;
            var schemes = response.schemes;
            displayUserDetails(userDetails);
            displaySchemes(schemes);
        }
    };
    xhr.send(formData);
    function displayUserDetails(userDetails) {
    var userDetailsContainer = document.getElementById("userDetailsContainer");
    userDetailsContainer.innerHTML = ""; 
    var userDetailsHTML = "<h2>User Details</h2>";
    userDetailsHTML += "<p>Age: " + userDetails.age + "</p>";
    userDetailsHTML += "<p>Caste: " + userDetails.caste + "</p>";
    userDetailsHTML += "<p>Profession: " + userDetails.profession + "</p>";
    userDetailsContainer.innerHTML = userDetailsHTML;
}

function displaySchemes(schemes) {
    var schemesContainer = document.getElementById("schemesContainer");
    schemesContainer.innerHTML = ""; 
    var uniqueSchemeIds = new Set();
    
    schemes.forEach(function(scheme) {
        
        if (!uniqueSchemeIds.has(scheme.id)) {
            
            uniqueSchemeIds.add(scheme.id);

            var schemeElement = document.createElement("div");
            schemeElement.className = "col-md-6 mb-4 scheme";
            schemeElement.innerHTML = `
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h3 class="card-title">${scheme.Title}</h3>
                        <p class="card-text">${scheme.Desciption}</p>
                        <a class="card-text" href='schemes.php?id=${scheme.id}'">View More</a>
                    </div>
                </div>`;
            schemesContainer.appendChild(schemeElement);
        }
    });
}

});

</script>
</body>
</html>
