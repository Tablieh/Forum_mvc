<?php
    use App\Core\Session;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ? " - ".$title : "" ?></title>
</head>
<body> 
    <?php include("messages.php"); ?>

    <div>
        <?= $page //ici s'intègrera la page que le contrôleur aura renvoyé !!?> 
    </div>
</body>
</html>
    