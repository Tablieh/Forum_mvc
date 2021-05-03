<?php
    use App\Core\Session;
?>

<h1>
    make a new subject
</h1>

<form  id="connexion" action="?ctrl=Forumsubjet&action=addTopic" method="post">
    <p>
        <label for="titre">Titre de sujet : </label><br>
        <input  class="uk-input uk-form-width-large"type="texte" name="titre" id="titre" required>
    </p>
    <p>
        <label for="message">Text de message : </label><br>
        <textarea class="uk-textarea uk-form-width-large" id="message" name="texte"></textarea>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input class="uk-button uk-button-secondary" type="submit" name="submit" value="Creer le sujet">
    </p>
</form>