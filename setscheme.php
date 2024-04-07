
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
<style>

</style>
<body>
    <div class="header ">
        
        <nav class="navbar navbar-light bg-light">
        <a href="index.php">Home</a>
        <form class="form-inline d-flex justify-content-between">
  
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
        <center>
                <h1>Schemes List</h1>
        </center>     
  
    </div>
<div class="container d-flex flex-wrap">
<?php 
include 'connect.php';
$sql = "Select * from `schemes`";
$res = mysqli_query($con,$sql);
if($res){
     while($row = mysqli_fetch_assoc($res)){
        $id = $row['Id'];
        $name = $row['Name'];
        $dep = $row['Dept'];
        $description = $row['Description'];
        echo '
        <div class="card m-2" style="width: 18rem;">
<i class="bi bi-heart"></i>
  <img src="backg.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$name.'</h5>
    <p class="card-text">'.$description.'</p>
  </div>
  <div class="card-body d-flex justify-content-between">
    <a href="set.php" class="card-link">Modify'.$id.'</a>
    <a href="/Mini-project/delete.php?id='.$id.'" class="text-decoration-none text-dark">
    <div class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
    </svg>
    </a>
    </div>
  </div>
  </div>  
        ';
     }

}
?>
</div>
</body>
</html>