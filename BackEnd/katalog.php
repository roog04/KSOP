<?php
	require "db.php";
	error_reporting(0);
	$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Katalog</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<body>
	<header>

		<div class="main_logo">

			<img src="img/Axe.png" alt="axe" class="logo">
			<div class="rectangle"></div>
			<h1 class="main_title">RAGNARÖK</h1>
		</div>

		<nav>
			<ul class="menu">
				<li><a href="katalog.php" class="menu-list">MAIN</a></li>
				<li><a href="signin.php" class="menu-list">PROFILE</a></li>
				<li><a href="about.html" class="menu-list">ABOUT</a></li>
				<li><a href="https://t.me/+NkPXbj401otlYTEy" target="_blank" class="menu-list">CONTACTS</a></li>
			</ul>
		</nav>
		
		<nav>
			<ul class="lang">
				<li><a href="" class="lang-list">UA</a></li>
				<li><a href="" class="lang-list">EN</a></li>
			</ul>
		</nav>

	</header>
	<main>
		<?php if($user) : ?>
			<p>Welcome, <?php echo $user->email; ?></p>
			<a href="addobj.php">Add film</a>
			<a href="logout.php">LogOut</a>
		<?php else : ?>
			<p>Unsigned user</p>
		<?php endif; ?>
		<div class="white-div">
			<h2>ФІЛЬМИ</h2>
			<h3>українською мовою</h3>
		</div>
		
		<div class="main">
			
					<?php
						$dbUser = 'root';
						$dbName = 'ksop';
						$dbPass = '';
						$mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);
						$query = "set names utf8";
						$mysqli ->query($query);
						$query = "select * from products";
						$result = $mysqli->query($query);
						while($row = $result->fetch_assoc()){
							echo '
							<nav>
							<ul class="films">
							<li><a href="'.$row["photo"].'" target="_blank" download>
							<div class="item"> <img src="'.$row["photo"].'" alt="film">
								<p>'.$row["name"].'</p>
							</div>
							</a></li>
							</ul>
							</nav>
						';
						}
					?>
		</div>
	</main>
	<footer>
		<h1>FAST & EASY</h1>
		<br><br><br>
		<br><br><br>
		<br><br><br>
		<nav>
			<ul class="bottom-bar">
				<li>
					<div class="rect">
						<div class="text">
							<h4>1. Ask your question</h4>
							<h5>We will be there when you most <br> need us</h5>
						</div>
					</div>
				</li>
				<li>
					<div class="rect">
						<div class="text">
							<h4 class="center">02. movies that are not there</h4>
							<h5>We listen to you</h5>
						</div>
					</div>
				</li>
				<li>
					<div class="rect">
						<div class="text">
							<h4>03. your ideas</h4>
							<h5>What to add to the site</h5>
						</div>
					</div>
				</li>
			</ul>
		</nav>
		<div class="foot">
			<div class="auto">
				© 2022 Auto theme by Frontend Tricks
			</div>
			<div class="icons">
				<a href="https://www.linkedin.com/in/ярослав-приймачук-8935b324b/" target ="_blank"><img src="img/LinkedIn.png" alt=""></a>
				<a href="https://www.facebook.com/people/Ярослав-Приймачук/100013560936539/" target ="_blank"><img src="img/Facebook.png" alt=""></a>
			</div>
		</div>
	</footer>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
</body>

</html>