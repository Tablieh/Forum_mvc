<h1 class="titre">
    Inscrivez-vous !!
</h1>

<form class="info" action="?ctrl=security&action=register" method="post">
    <p class="uk-margin">
        <label for="pesudo">Votre pesudo : </label><br>
        <input class="uk-input uk-form-width-medium" type="pesudo" name="pesudo" id="pesudo" required>
    </p>
    <p class="uk-margin">
        <label for="email">Votre email : </label><br>
        <input class="uk-input uk-form-width-medium" type="email" name="email" id="email" required>
    </p>
    <p class="uk-margin">
        <label for="MoteDePass">Votre mot de passe : </label><br>
        <input class="uk-input uk-form-width-medium" type="password" name="MoteDePass" id="MoteDePass" required>
    </p>
    <p class="uk-margin">
        <label for="MoteDePass">Ressaisir votre mot de passe : </label><br>
        <input class="uk-input uk-form-width-medium" type="password" name="password_repeat" id="passr" required>
    </p>
    <p class="uk-margin">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input class="uk-input uk-form-width-medium" type="submit" name="submit" value="S'INSCRIRE">
    </p>
</form>