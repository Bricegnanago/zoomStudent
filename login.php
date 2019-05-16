<?php    
session_start();
    require 'partials/functions.php';  
?>

<?php       
        
        if(isset($_POST['signin'])){
            $errors = array();
            if(empty($_POST['username'])){
                $errors["username"] = "Email ou username requis ";
            }
            if(empty($_POST['pass'])){
                $errors["pass"] = "Mot de passe requis";
            }
            else{
				require "db.php";
				$connect = Database::connect();
				
                $req = $connect->prepare("SELECT * FROM users WHERE username= :username OR email= :username");
                $req->execute(['username' => $_POST['username']]);
                $user = $req->fetch();
                if($user){
                    if($_POST['pass'] == $user["pass"]){
                        $_SESSION['auth'] = $user;
                        // $_SESSION['flash']['success'] = "Vous êtes maintenant connecté";
                        header('Location: liste.view.php');
                        exit();
                    }else{
                        $_SESSION['flash']['danger'] = "Mot de passe incorrect";
                    }
                }else{                    
                    $_SESSION['flash']['danger'] = "Cet utilisateur n'existe pas";
                }
            }            
        }

            
        
        
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agitel | connexion</title>
        <style>     
        </style>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_init.css">
    
</head>
<body>

    <div class="main">                
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">S'inscrire</a>
                    </div>
                    
                    <div class="signin-form">

                        <h2 class="form-title">Se connecter</h2>
                        <?php if(!empty($errors)):?>
                            <div class="alert alert-danger">
                                <ul class="list-style-item">
                                    <?php foreach($errors as $error):?>
                                    
                                        <li><?= $error; ?></li>
                                    <?php endforeach;?>
                                </ul>                            
                            </div>
                        <?php endif;?>
                        
                        <?php if(isset($_SESSION['flash'])):?>
                            <?php foreach($_SESSION['flash'] as $type => $message):?>
                            <div class="alert alert-<?= $type; ?>">
                                <?= $message ; ?>
                            </div>         
                            <?php endforeach; ?>
                            <?php unset($_SESSION['flash']);?>
                        <?php endif; ?>

                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Nom ou email" value="<?php if(isset($_POST['signin'])){ echo $_POST['username'];}?>" />
                            </div>                                                    
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Mot de passe" />
                            </div>
                            
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Se souvenir de moi !</label>                                
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Connexion"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>