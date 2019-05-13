<!-- partie traitement -->

<?php    
session_start();
    require 'partials/functions.php';  
?>


<?php require 'partials/header.php';?>
<?php 

    
	if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
		require "partials/db.php";
		$req = $pdo->prepare("SELECT * FROM users WHERE username= :username OR email= :username AND confirmed_at IS NOT NULL ");
		$req->execute(['username' => $_POST['username']]);
		$user = $req->fetch();
		if(password_verify($_POST['password'], $user->password)){
			$_SESSION['auth'] = $user;
			$_SESSION['flash']['success'] = "Vous êtes maintenant connecté";
			header('Location: account.php');
			exit();
		}else{
			$_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrecte";
		}
		debug($user);
	}
	
?>












<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

	<title>Coming Soon</title>
</head>
<body>
	<div class="page">
		<img src="images/logo_AGITEL.png" alt="" class="logo">	
		<section class="skew"></section>
		<div class="opacity"></div>
		
		<section class="left">
			<h1 class="title">Connexion</h1>
			<p class="desc">Veuillez vous conncter afin d'acceder à la plateforme
			</p>
			<form action="" method="post">
				<input type="email" name="email" id="email" placeholder="Adresse email...">			
				<input type="password" name="password" id="password" placeholder="Mot de passe...">
				<input type="submit" value="NOTIFY ME" id="notify">

			</form>
			
		</section>	
	
	</div>
		
	
</body>
</html>