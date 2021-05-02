<h1>
    Inscrivez-vous !!
</h1>
<form action="?ctrl=security&action=register" method="post">
<p>
        <label for="pesudo">Votre pesudo : </label><br>
        <input type="pesudo" name="pesudo" id="pesudo" required>
    </p>
    <p>
        <label for="email">Votre email : </label><br>
        <input type="email" name="email" id="email" required>
    </p>
    <p>
        <label for="MoteDePass">Votre mot de passe : </label><br>
        <input type="password" name="MoteDePass" id="MoteDePass" required>
    </p>
    <p>
        <label for="MoteDePass">Ressaisir votre mot de passe : </label><br>
        <input type="password" name="password_repeat" id="passr" required>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input type="submit" name="submit" value="S'INSCRIRE">
    </p>
</form>