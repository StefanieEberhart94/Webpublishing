<nav>
	<header>
	<h1>Mike and the Electronics</h1>
</header>
	<div id="Navigation">
	<ul>
		<li <?php echo $_SERVER["REQUEST_URI"]=="/Home.php"?"class='active'":"" ?>><a href="/Home.php">HOME</a></li>
		<li <?php echo $_SERVER["REQUEST_URI"]=="/Bio/Bio.php"?"class='active'":"" ?>><a href="/Bio/Bio.php">BIOGRAPHIE</a></li>
		<li <?php echo $_SERVER["REQUEST_URI"]=="/Musik/Musik.php"?"class='active'":"" ?>><a href="/Musik/Musik.php">MUSIK</a></li>
		<li <?php echo $_SERVER["REQUEST_URI"]=="/Buchen/Buchen.php"?"class='active'":"" ?>><a href="/Buchen/Buchen.php">BUCHEN</a></li>
		<li <?php echo $_SERVER["REQUEST_URI"]=="/Events/Events.php"?"class='active'":"" ?>><a href="/Events/Events.php">EVENTS</a></li>
	</ul>
	</div>
</nav>