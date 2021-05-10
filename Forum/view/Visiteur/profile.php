<?php
    //$user = $_SESSION['user'];
    //var_dump($user);
    $Visiteur = $data['Visiteur'];
    //var_dump($Visiteur);
    /*
    $now = new DateTime();

    $end_ban = $Visiteur->getEnd_ban();

    echo $now->format("d/m/Y H:i:s");

    $int = new \DateInterval("P30DT0H");
    echo "<br>";
    $now->add($int);
    echo "<br>";
    echo $now->format("d/m/Y H:i:s");
    */
?>
<h1 class="info">PROFILE</h1>
    <div class="info">
        <p> pesudo : <?= $Visiteur->getpesudo() ?> </p>
        <p> mail : <?= $Visiteur->getEmail() ?> </p>
        <p> get date de visit : <?= $Visiteur->getDateDeVisite()?> </p>
        <p> Role: <?= $Visiteur->getRole()?> </p>
    </div>    
        
        <?php

?>


