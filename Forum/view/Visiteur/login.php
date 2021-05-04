<h1 class="titre">
    Connectez-vous !!
</h1>

<form class="info" action="?ctrl=security&action=login" method="post">
    <p class="uk-margin">
        <label  for="text">Votre email or pesudo : </label><br>
        <input class="uk-input uk-form-width-medium" type="text" name="pesudo-or-email" id="text" required>
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