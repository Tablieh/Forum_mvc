<?php
    use App\Core\Session;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="./public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ? " - ".$title : "" ?></title>
</head>
<body> 
    <?php include("messages.php"); ?>

    <div>
    <nav class="uk-navbar-container" uk-navbar>

    <div class="uk-navbar-left">
    <ul class="uk-navbar-nav">
            <li><a href="?ctrl=home">Acceuil</a></li>
            <?php if(Session::getVisiteur()){
            ?>
            <li><a href="?ctrl=security&action=logout">Visiteur LogOut</a><br></li>
            <li><a href="?ctrl=security&action=profile">Mon profile</a><br></li>
            <li><a href="?ctrl=security&action=members">List Membre</a><br></li>
            <?php
            }
            else{
                ?>
                <li class="uk-active"><a href="?ctrl=security&action=login">Visiteur Login</a> <br></li>
                <li><a href="?ctrl=security&action=register">Visiteur Log up</a><br></li>
                <?php
            }
            ?>
            
                
            
        </ul>
    </div>
    </nav>

        <?= $page //ici s'intègrera la page que le contrôleur aura renvoyé !!?> 
    </div>
</body>
</html>
    