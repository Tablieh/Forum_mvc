<?php
    use App\Core\Session;
?>



<form  class="info" action="?ctrl=Forumsubjet&action=addTopic" method="post">
    <h1><strong> make a new subject </strong>
       
    </h1>
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