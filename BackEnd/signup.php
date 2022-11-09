<?php
	require "db.php";
	$data = $_POST;
	$showError = FALSE;

	if(isset($data['signup']))	{
		$errors = array();
		$showError = TRUE;

		if(trim($data['firstname']) == '')	{
			$errors[] = "Вкажіть ім'я";
		}
		
		if(trim($data['lastname']) == '')	{
			$errors[] = "Вкажіть прізвище";
		}
		
		if(trim($data['email']) == '')	{
			$errors[] = "Вкажіть email";
		}
		
		if(trim($data['password']) == '')	{
			$errors[] = "Вкажіть пароль";
		}
		
		if(trim($data['password']) != trim($data['password_2']))	{
			$errors[] = "Паролі не співпадають";
		}

		if(R::count('users', 'email = ?', array($data['email'])) > 0)	{
			$errors[] = "Користувач із таким Email уже зареєстрований";
		}

		if(empty($errors))	{
			$user = R::dispense('users');
			$user->firstname = $data['firstname'];
			$user->lastname = $data['lastname'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
		}
	}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reg Account</title>
	<!--<link rel="stylesheet" href="css/auth.css">-->
</head>
<body>
	<div class="content" align="center">
		<form action="/signup.php" method="post" class="authform">
			<p>Реєстрація</p>
			<input type="text" name="firstname" placeholder="Ім'я"><br>
			<input type="text" name="lastname" placeholder="Фамілія"><br>
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Пароль"><br>
			<input type="password" name="password_2" placeholder="Підтвердити пароль"><br>
			<button type="submit" name="signup">Реєстрація</button>
			<p>Вже маєте аккаунт? <a href="signin.php">Увійти</a></p>
			<p>Повернутись на <a href="katalog.php">головну</a></p>
		</form>
		<p><?php if($showError) { echo showError($errors); } ?></p>
	</div>
</body>