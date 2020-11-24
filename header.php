

<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE ?></title>
	
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- external css link-->
<link rel="stylesheet" type="text/css" href="style/header.css">

</head>

<body>
	<!-- Top navbar -->
<nav class="navbar fixed-top flex-md-nowrap p-0 shadow" >
	<div class="log">
		<ul class="breadcrumb">
			<li class="breadcrumb-item disabled">Admin</li>
			<li class="breadcrumb-item active"><a href="changepass.php" class="text-info">ChangePassword</a></li>
			<li class="breadcrumb-item active"><a href="logout.php" class="text-info">LogOut</a></li>
		</ul>
	</div>
	
</nav>



<!--Side Bar -->
<div class="container-fluid">
	<div class="row sidenav">
		<nav class="col-sm-2 d-none d-md-block bg-dark sidebar">
			<div class="sidebar-sticky sidenav">
				<a href="dashboard.php" class="navbar-brand">
					<img src="images/logo.JPG" alt="logo image" >
				</a>
				<ul class="nav flex-column  sideitem">
					<li class="nav-item">
						<a href="dashboard.php" class="nav-link <?php if($page=='dashboard'){echo 'active';} ?>" >
							<i class="fas fa-th-large p-1"></i>  Dashboard
						</a>
					</li>

					<li class="nav-item  dropdown">
						<a class="nav-link" >
							<i class="fas fa-indent p-1"></i>  Category <span class="fas fa-caret-down"></span>
						</a>
						<ul> 
							<li class="subpart">
								<a href="addcategory.php" class="nav-link <?php if(PAGE=='addcategory'){echo 'active';} ?> " >
									<i class="fas fa-plus p-1"></i>  Add 
								</a>
								<a href="category.php" class="nav-link <?php if(PAGE=='category'){echo 'active';} ?> " >
									<i class="fas fa-eraser p-1"></i>  Manage
								</a>
							</li>
						 </ul>
					</li>

					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" >
							<i class="fas fa-layer-group p-1"></i>  Posts<span class="fas fa-caret-down"></span>
						</a>
						<ul> 
							<li class="subpart">
								<a href="addpost.php" class="nav-link <?php if(PAGE=='addpost'){echo 'active';} ?> " >
									<i class="fas fa-plus p-1"></i>  Add 
								</a>
								<a href="post.php" class="nav-link <?php if(PAGE=='post'){echo 'active';} ?> " >
									<i class="fas fa-eraser p-1"></i>  Manage
								</a>
							</li>
						 </ul>
					</li>
					<li class="nav-item">
						<a href="addabout.php" class="nav-link <?php if(PAGE=='page'){echo 'active';} ?>" >
							<i class="fas fa-book-open"></i>  About Page
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" >
							<i class="fas fa-layer-group p-1"></i>  Positive's<span class="fas fa-caret-down"></span>
						</a>
						<ul> 
							<li class="subpart">
								<a href="addpos.php" class="nav-link <?php if(PAGE=='addpost'){echo 'active';} ?> " >
									<i class="fas fa-plus p-1"></i>  Add 
								</a>
								<a href="positive.php" class="nav-link <?php if(PAGE=='post'){echo 'active';} ?> " >
									<i class="fas fa-eraser p-1"></i>  Manage
								</a>
							</li>
						 </ul>
					</li>

					<li class="nav-item">
						<a href="home.php" class="nav-link" >
							<i class="fas fa-home p-1"></i>  Home Page
						</a>
					</li>
				</ul>

			</div>     
		</nav>





		

