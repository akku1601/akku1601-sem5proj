
<!DOCTYPE html>
<html>
  <head>
    <title>Focus News</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- external css link -->
    <link href="style/home.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
<!--Header start-->
      <header class="blog-header py-3">
      <div class="row flex-nowrap">
<!--Logo image at topbar -->
      <div class="col-4 align-items-start">
        <img src="images/logo.JPG" alt="logo image" style="width: 300px;" >
      </div>

<!--Topbar contents -->
      <div class="col-8 d-flex justify-content-end mt-5">
<!--Nvaigation bar -->
        <nav class="nav">
         <a class="p-2 text-dark font-weight-bold mr-2 top-nav" href="home.php"><i class="fas fa-home p-1"></i>Home</a>
         <a class="p-2 text-dark  font-weight-bold mr-2 top-nav" href="about.php"><i class="fas fa-info-circle p-1"></i>About Us</a>
         <a class="p-2 text-dark font-weight-bold mr-2 top-nav" href="#contact"><i class="fas fa-handshake p-1"></i>Contact Us</a>
        </nav>

<!--Search bar -->
        <form action="search.php" method="post"> 
          <div class="input-group sm-3 ml-3 search">
            <input type="text" name="search" class="form-control" placeholder="Search">
            <div class="input-group-append">
              <button class="btn btn-success" name="submit" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </header>
<!--Header End-->
<br>