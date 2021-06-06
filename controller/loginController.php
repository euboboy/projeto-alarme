<?php

include '../models/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['nome'])) {
	header("Location: ../views/main/main.php");
}
$mensage = '';
 if (isset($_POST['submitLogin'])) {
   echo "<script>alert('pegou o click.')</script>";
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nome'] = $row['nome'];
		header("Location: ../views/main/main.php");
	} else {
        header("Location: ../index.php");
    	echo "<script>alert('Ups! Email ou senha incorretos.')</script>";
		// $mensage = 'Ups! Email ou senha incorretos';
	}
 }