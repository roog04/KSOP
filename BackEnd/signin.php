<?php
	require "db.php";
	$data = $_POST;
	$showError = FALSE;

	if(isset($data['signin']))	{
		$errors = array();
		$showError = TRUE;

		if(trim($data['email']) == '')	{
			$errors[] = "Вкажіть email";
		}
		
		if(trim($data['password']) == '')	{
			$errors[] = "Вкажіть пароль";
		}

		$user = R::findOne('users', 'email = ?', array($data['email']));
		if($user)	{
			if(password_verify($data['password'], $user->password))	{
				$_SESSION['user'] = $user;
			}
			else	{
				$errors[] = 'Неправильний пароль'; 
			}
		}
		else	{
			$errors[] = 'Користувач не знайдений';
		}
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auth Account</title>
	<!--<link rel="stylesheet" href="css/auth.css">-->
</head>
<body>
	<div class="content" align="center">
		<form action="/signin.php" method="post" class="authform">
			<p>Авторизація</p>
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Пароль"><br>
			<button type="submit" name="signin">Вхід</button>
			<p>Нe маєте аккаунту? <a href="signup.php">Зареєструватись</a></p>
			<p>Повернутись на <a href="katalog.php">головну</a></p>
		</form>
		<p><?php if($showError) { echo showError($errors); } ?></p>
	</div>
</body>