<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap aside menu, vertical, sidebar nav menu CSS examples" />
<meta name="description" content="Bootstrap 5 sidebar navigation menu example" />  

<title>Data Analytics</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
<!-- ======= Icons used for dropdown (you can use your own) ======== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<style type="text/css">

.sidebar li .submenu{ 
	list-style: none; 
	margin: 0; 
	padding: 0; 
	padding-left: 1rem; 
	padding-right: 1rem;
}
.sidebar .nav-link {
    font-weight: 500;
    color: var(--bs-dark);
}
.sidebar .nav-link:hover {
    color: var(--bs-primary);
}

</style>


</head>
<body class="bg-light">

 <!-- section-header.// -->

<div class="container">

<section class="section-content py-3">
	<div class="row">
		<aside class="col-sm-3"> 
<!-- ============= COMPONENT ============== -->
<nav class="sidebar card py-2 mb-4" style="position: fixed; left: 25px; width:23%; height: 95%;">
    <header class="section-header py-3">
        <div class="container">
            <h2>Data Analytics</h2> 
        </div>
        </header>
<ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item1" href="#"> Event Golden Malam Match Fish <i class="bi small bi-caret-down-fill"></i> </a>
        <ul id="menu_item1" class="submenu collapse" data-bs-parent="#nav_accordion">
            <li><a class="nav-link" href="{{ route('matchFish_index') }}">All Data</a></li>
            <li><a class="nav-link" href="{{ route('matchFishDayView') }}">Average Data Per Day</a></li>
            <li><a class="nav-link" href="{{ route('matchFishWeekView') }}">Average Data Per Week</a></li>
            <li><a class="nav-link" href="{{ route('matchFishYearView') }}">Average Data Per Year</a></li>
            <li><a class="nav-link" href="{{ route('matchFish_average') }}">Average Data</a></li>
        </ul>

    </li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item2" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item2" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item3" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item3" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item4" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item4" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item5" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item5" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item6" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item6" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item7" href="#"> Event <i class="bi small bi-caret-down-fill"></i> </a>
		<ul id="menu_item7" class="submenu collapse" data-bs-parent="#nav_accordion">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 5 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		    <li><a class="nav-link" href="#">Submenu item 6 </a></li>
		</ul>
	</li>
</ul>
</nav>
<!-- ============= COMPONENT END// ============== -->	
		</aside>
		<main class="col-lg-9">
            @yield('content')
		</main>
	</div>
</section>

</div><!-- container //  -->

</body>
</html>