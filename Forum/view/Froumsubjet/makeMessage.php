<?php
    use App\Core\Session;
?>

<h1>
    make a new message
</h1>

<form  id="add" action="?ctrl=Message&action=addMessage" method="post">
    <p>
        <label for="message">Text de message : </label><br>
        <textarea class="uk-textarea uk-form-width-large" id="message" name="texte"></textarea>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input class="uk-button uk-button-secondary" type="submit" name="submit" value="Creer le sujet">
    </p>
</form>