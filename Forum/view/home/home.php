<?php
    $controller_name = $data['controller_name'];
?>

<h1 class="titre">HELLO <?= $controller_name ?></h1>
<div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="?ctrl=security&action=login">Visiteur Login</a> <br></li>
            <li>
            <a href="?ctrl=security&action=register">Visiteur log up</a>
            </li>
        </ul>

    </div>
