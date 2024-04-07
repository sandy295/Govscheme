<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
       .gap-10px {
        width: 10px;
        min-width: 10px;
    }
</style>
<body>
    <div class="header">
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
    </div>
    <div class="container d-flex flex-wrap">
            <div class="card p-2 m-3" style="width: 18rem;">
               <img src="backg.png" class="card-img-top" alt="...">
               <div class="card-body">
               <h5 class="card-title">Add </h5>
               <p class="card-text">Add a New Government Schemes To verify the eligility Criteria</p>
               <a href="addscheme.php" class="btn btn-primary">Add</a>
               </div>
            </div>
            <div class="card p-2 m-3" style="width: 18rem;">
               <img src="backg.png" class="card-img-top" alt="...">
               <div class="card-body">
               <h5 class="card-title">Set </h5>
               <p class="card-text">Set the eligility Criteria for a New Government Schemes</p>
               <a href="setscheme.php" class="btn btn-primary">Set</a>
               </div>
            </div>
    </div>
</body>
</html>