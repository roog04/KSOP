<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add film</title>
</head>
<body>
	<form align="center">
		<label >Введіть назву фільму:</label><br>
		<input type="text" name="name"><br>

		<label>Введіть адресу постера: <br> Формат : img/Назва.формат</label><br>
		<input type="text" name="photo"><br>
		<br>
		<input type="submit" name="formSubmit" vakue="Добавити" >
		<p>Повернутись на <a href="katalog.php">головну</a></p>
	</form>

	<?php
		if(isset($_GET['formSubmit']))	{
			$nameform=$_GET['name'];
			$photoform=$_GET['photo'];
			$mysqli = new mysqli("localhost", "root", "", "ksop");
			if($mysqli->connect_errno)	{
				echo "Помилка на сайті";
				exit;
			}
			$name = '"' .$mysqli->real_escape_string($nameform).'"';
			$photo = '"'.$mysqli->real_escape_string($photoform).'"';
			$query = "INSERT INTO products (name, photo) VALUES ($name, $photo)";
			$result = $mysqli->query($query);
			if($result)	{
				print('Успіх!'. '<br>');
			}
			$mysqli->close();
		}
	?>

</body>
</html>