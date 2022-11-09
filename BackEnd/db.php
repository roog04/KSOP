<?php
	require "libs/rb-mysql.php";

	R::setup('mysql:host=localhost;dbname=swa', 'root', '');

	session_start();

	function showError($errors)	{
		return array_shift($errors);
	}
?>