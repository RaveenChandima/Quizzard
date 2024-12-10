<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Admin Panel</title>
	<link rel="icon" href="https://icons.veryicon.com/png/o/miscellaneous/advanceico/user-255.png" type="image/x-icon">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
	<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
	<style>
	#main-nav,
	#modal-body {
		background-color: #03362A;
	}
	</style>
</head>

<body id="page-top">
	<div id="wrapper">
		<nav id="main-nav" class="navbar align-items-start sidebar sidebar-dark accordion  p-0" style="padding-bottom: 0px; ">
			<div class="container-fluid d-flex flex-column p-0">
				<a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
					<div class="sidebar-brand-text mx-3"><span>Admin Panel</span></div>
				</a>
				<hr class="sidebar-divider my-0">
				<ul class="navbar-nav text-light" id="accordionSidebar">
					<li class="nav-item"><a id="anchor1" class="nav-link" href="dash.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
					<li class="nav-item"><a id="anchor2" class="nav-link" href="admin_students.php"><i
                                class="fas fa-user"></i><span>&nbsp;Students</span></a></li>
					<li class="nav-item"><a id="anchor3" class="nav-link" href="admin_lecturers.php"><i
                                class="fas fa-graduation-cap"></i><span>Lecturers</span></a></li>
				</ul> <a class="btn btn-dark btn-dark btn-md" role="button" data-bss-hover-animate="pulse" href="includes/logout.inc.php">Log
                    Out</a>
				<hr class="sidebar-divider my-2">
				<div class="text-center d-none d-md-inline">
					<button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
				</div>
			</div>
		</nav>
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-light navbar-expand-md bg-white shadow mb-4 py-3 static-top">
					<div class="container-fluid">
						<button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"> <i class="fas fa-bars"></i> </button>
						<h4>Quizzard Admin Panel</h4>
						<h4 class="align-self-right"><i class="fas fa-user"></i><span>&nbsp;Hello Admin</span></h4> </div>
				</nav>