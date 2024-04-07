<?php
session_start();
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navigation Bar</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/efe6ffc46d.js" crossorigin="anonymous"></script>
  <style>
    /* Custom CSS */
    .search-input {
      width: 200px; /* Set width for the search input */
      border: 2px solid rgb(118, 229, 99); /* Set green border color */
    }
    .navbar-brand img {
      max-height: 40px; /* Adjust according to your logo size */
    }
    .navbar-nav .nav-link {
      font-size: 18px; /* Classic font size */
    }
    .navbar-text  {
  color: rgb(232, 73, 73); /* Change icon color to red */
}
.navbar-nav .nav-item {
      margin-right: 20px; /* Increase the space between nav items */
    }
    .navbar-nav .nav-item:hover {
      background-color: rgb(118, 229, 99);
      border-radius: 10px; 
    }
    .navbar-nav .nav-item:hover .nav-link {
      color: white; /* Change font color to black when hovered */
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
      text-align: center; /* Align text to center */
      padding: 0 20px; 
      /* Add padding */
    }
    .carousel-item img {
      max-width: 80%; /* Set maximum width of images to 100% */
      height: auto; /* Ensure images maintain aspect ratio */
    }
    body {
      background-color: rgb(217, 221, 232); /* Set background color */
    }
    .navbar {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
    }
    .white-section {
      background-color: white; /* Set background color */
      padding: 40px 0; /* Add padding */
    }
    .card-img-top {
      max-height: 200px; /* Set maximum height for card image */
      margin: 10px auto; /* Center align card image */
    }
    .card {
      border-radius: 15px; /* Rounded corners */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
      margin-bottom: 20px;
    }
    .card:hover {
      transform: translateY(-5px); /* Lift card slightly on hover */
      transition: transform 0.3s ease; /* Add smooth transition */
    }
    .card-body {
      padding: 20px; /* Add padding inside card body */
    }
    footer {
      background-color: #333; /* Background color */
      color: white; /* Text color */
      padding: 20px 0; /* Padding */
    }
    #f{
        height: 100%;
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
      <li class="nav-item ">
        <a class="nav-link" href="landing.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="schemes.php">Schemes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Category
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php
        // Fetch categories from the database
        include'connect.php';
        $sql_categories = "SELECT DISTINCT category FROM `scheme`";
        $res_categories = mysqli_query($con, $sql_categories);
        if ($res_categories) {
          while ($row_category = mysqli_fetch_assoc($res_categories)) {
            $category_name = $row_category['category'];
            echo '<a class="dropdown-item" href="schemes.php?category='.$category_name.'">'.$category_name.'</a>';
          }
        }
        ?>
      </div>
    </div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search" id="searchInput" onkeyup="searchSchemes()">
    </form>
      <span class="navbar-text" data-toggle="tooltip" data-placement="top" title="Logout">
        <a href="logout.php">
      <i class="fa-solid fa-right-from-bracket fa-2x" style="color: rgb(231, 102, 102);"></i>
      </a>
    </span>
  </div>
</nav>
</div>
<div class="container mt-5">
  <div class="row justify-content-center"> 
  <div class="col-md-12">
    </div>
  <?php 
    include 'connect.php';
    if(isset($_GET['id'])) {
      $scheme_id = $_GET['id'];
      $sql = "SELECT * FROM `scheme` WHERE id = $scheme_id";
      $res = mysqli_query($con, $sql);
      if ($res) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['Title'];
        $description = $row['Desciption'];
        $link = $row['Link'];
        echo '
          <div class="col-md-6 id="f"">
            <div class="card m-2 " >
              <div class="card-body ">
                <h5 class="card-title">' . $name . '</h5>
                <p class="card-text">' . $description . '</p>
              </div>
              <div class="card-body d-flex justify-content-between align-items-center">
                <a href="#" class="card-link">' . $link . '</a>
              </div>
            </div>
          </div>';
      }
    }
    elseif (isset($_GET['category'])) {
        // If category is provided, display schemes based on the category
        $category = $_GET['category'];
        $sql = "SELECT * FROM `scheme` WHERE category = '$category'";
        $res = mysqli_query($con, $sql);
        if ($res) {
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $name = $row['Title'];
            $description = $row['Desciption'];
            echo '
              <div class="col-md-6 id="f"">
                <div class="card m-2">
                  <div class="card-body">
                    <h5 class="card-title">' . $name . '</h5>
                    <p class="card-text">' . $description . '</p>
                  </div>
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <a href="schemes.php?id='.$id.'" class="card-link">View More == ' . $id . '</a>
                  </div>
                </div>
              </div>';
          }
        }
    }
     else {
      // If no id is provided, display all schemes
      $sql = "SELECT * FROM `scheme`";
      $res = mysqli_query($con, $sql);
      if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $name = $row['Title'];
          $description = $row['Desciption'];
          echo '
            <div class="col-md-6 id="f"">
              <div class="card m-2">
                <div class="card-body">
                  <h5 class="card-title">' . $name . '</h5>
                  <p class="card-text">' . $description . '</p>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                  <a href="schemes.php?id='.$id.'" class="card-link">View More == ' . $id . '</a>
                </div>
              </div>
            </div>';
        }
      }
    }
    ?>
</div>
</div>
<footer class="text-center" id="contact">
  <p>&copy; 2023  Contact US : info@srec.ac.in</p>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function searchSchemes() {
      var input, filter, cards, card, title, i;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      cards = document.getElementsByClassName("card");
      for (i = 0; i < cards.length; i++) {
        card = cards[i];
        title = card.querySelector(".card-title");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      }
    }
</script>
</body>
</html>
