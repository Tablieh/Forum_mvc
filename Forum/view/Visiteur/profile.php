<?php
    //$user = $_SESSION['user'];
    //var_dump($user);
    $Visiteur = $data['Visiteur'];
    //var_dump($Visiteur);
    $now = new DateTime();

    $end_ban = $Visiteur->getEnd_ban();

    echo $now->format("d/m/Y H:i:s");

    $int = new \DateInterval("P30DT0H");
    echo "<br>";
    $now->add($int);
    echo "<br>";
    echo $now->format("d/m/Y H:i:s");
?>

<h1>PROFILE</h1>
