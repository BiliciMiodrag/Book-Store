<!DOCTYPE html>
<html>
<?php
$db = mysqli_connect('localhost', 'root', '', 'bookstorephp');
if($db===false){
	die("ERROR: Could not connect.".$mysqli->connect_error);
}
$query="SELECT * FROM publisher ORDER BY publisher_name";





?>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BookStore</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<!-- Custom styles for this template -->
	<link href="layout/sidebar.css" rel="stylesheet">
	<link href="../layout/sidebar.css" rel="stylesheet">

</head>

<body>
	<?php if (isset($_SESSION['user'])) : 
		if ( $_SESSION['user']['user_type'] == 'admin' ) {?>

			<div class="d-flex" id="wrapper">

				<!-- Sidebar -->
				<div class="bg-light border-right" id="sidebar-wrapper">
					<div class="sidebar-heading"><a href="../index.php">BookStore</a> </div>
					<div class="list-group list-group-flush">
						<a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
						<a href="home.php" class="list-group-item list-group-item-action bg-light">Add Books</a>
						<a href="myprofile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
						<a href="create_user.php" class="list-group-item list-group-item-action bg-light">Add User</a>
						<a href="publishers.php" class="list-group-item list-group-item-action bg-light">Add Publisher</a>
					</div>
				</div>
				<!-- /#sidebar-wrapper -->

				<!-- Page Content -->
				<div id="page-content-wrapper">

					<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
						<button class="btn btn-primary" id="menu-toggle">Click</button>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

								<form class="form-inline my-2 my-lg-0" action="../search.php" method="GET">
									<input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
									<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
								</form>
								<li class="nav-item active">
									<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Bine ai venit 
										<strong><?php echo $_SESSION['user']['fname']; ?></strong></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="../index.php?logout='1'">Log out <span class="sr-only"></span></a>
									</li>
								</ul>
							</div>
						</nav>
					<?php  }else {?>
						<div class="d-flex" id="wrapper">

							<!-- Sidebar -->
							<div class="bg-light border-right" id="sidebar-wrapper">
								<div class="sidebar-heading"><a href="index.php">BookStore</a> </div>
								<div class="list-group list-group-flush">
									<a href="index.php" class="list-group-item list-group-item-action bg-light">Books</a>
									<a href="#" id="Publishers" onclick="
									showDiv()" class="list-group-item list-group-item-action bg-light">Publishers</a>

									<div  id="ana"   class="list-group">
										<?php 
										if ($result = $db->query($query)) {
											while ($row = $result->fetch_assoc()) {
												?>
												<a href="publisherbooks.php?publisher_id=<?php echo $row['publisherid'];?>" class="list-group-item"><?php echo $row['publisher_name'];?></a>
											<?php }} 
											?>
										</div>

										<a href="#" onclick=" hideDiv()" class="list-group-item list-group-item-action bg-light">Close Publishers</a>
										<a href="registration/myprofile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
									</div>
								</div>
								<!-- /#sidebar-wrapper -->

								<!-- Page Content -->
								<div id="page-content-wrapper">

									<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
										<button class="btn btn-primary" id="menu-toggle">Click</button>

										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
											<span class="navbar-toggler-icon"></span>
										</button>

										<div class="collapse navbar-collapse" id="navbarSupportedContent">
											<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

												<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
													<input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
													<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
												</form>
												<li class="nav-item active">
													<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#">Bine ai venit 
														<strong><?php echo $_SESSION['user']['fname']; ?></strong></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
													</li>
													<li class="nav-item active">
														<a class="nav-link" href="../index.php?logout='1'">Log out <span class="sr-only"></span></a>
													</li>
												</ul>
											</div>
										</nav>

									<?php } endif ?>
									<?php if (!isset($_SESSION['user'])) : ?>
										<div class="d-flex" id="wrapper">

											<!-- Sidebar -->
											<div class="bg-light border-right" id="sidebar-wrapper">
												<div class="sidebar-heading"><a href="index.php">BookStore</a> </div>

												<div  class="list-group list-group-flush" >
													<a href="index.php" class="list-group-item list-group-item-action bg-light">Books</a>

													<a href="#" id="Publishers" onclick="
													showDiv()" class="list-group-item list-group-item-action bg-light">Publishers</a>

													<div  id="ana"   class="list-group">
														<?php 
														if ($result = $db->query($query)) {
															while ($row = $result->fetch_assoc()) {
																?>
																<a href="publisherbooks.php?publisher_id=<?php echo $row['publisherid'];?>" class="list-group-item"><?php echo $row['publisher_name'];?></a>
															<?php }} 
															?>
														</div>

														<a href="#" onclick=" hideDiv()" class="list-group-item list-group-item-action bg-light">Close Publishers</a>
													</div>
												</div>

												<!-- /#sidebar-wrapper -->

												<!-- Page Content -->
												<div id="page-content-wrapper">

													<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
														<button class="btn btn-primary" id="menu-toggle">Click</button>

														<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
															<span class="navbar-toggler-icon"></span>
														</button>

														<div class="collapse navbar-collapse" id="navbarSupportedContent">
															<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

																<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
																	<input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
																	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
																</form>
																<li class="nav-item active">
																	<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>



																</li>
																<li class="nav-item dropdown">
																	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

																	</a>
																	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
																		<a class="dropdown-item" href="registration/login.php">Log In</a>
																		<a class="dropdown-item" href="registration/register.php">Register</a>
																	</div>
																</li>
															</ul>
														</div>
													</nav>
												<?php endif ?>


												<script >



													function showDiv(){
														document.getElementById("ana").style.display = 'block';
													}    

													function hideDiv(){
														document.getElementById("ana").style.display = 'none';
													} 

												</script>