<?php
    $controller_name = $data['controller_name'];
?>

<h1>HELLO <?= $controller_name ?></h1>
<a href="?ctrl=security&action=login">Visiteur Login</a> <br>
<a href="?ctrl=security&action=register">Visiteur log up</a>