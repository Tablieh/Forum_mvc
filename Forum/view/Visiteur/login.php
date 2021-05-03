<h1 class="titre">
    Connectez-vous !!
</h1>
<div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="?ctrl=security&action=login">Visiteur Login</a> <br></li>
            <li>
            <a href="?ctrl=security&action=register">Visiteur log up</a>
            </li>
        </ul>

    </div>
<form class="info" action="?ctrl=security&action=login" method="post">
    <p class="uk-margin">
        <label  for="mail">Votre email : </label><br>
        <input class="uk-input uk-form-width-medium" type="email" name="email" id="mail" required>
    </p>
    <p class="uk-margin">
        <label for="MoteDePass">Votre mot de passe : </label><br>
        <input class="uk-input uk-form-width-medium" type="password" name="MoteDePass" id="MoteDePass" required>
    </p>
    <p class="uk-margin">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input class="uk-input uk-form-width-medium" type="submit" name="submit" value="CONNEXION">
    </p>
</form>