<?php
    use App\Core\Session;

    $sujet = $data['sujet'];
    $messages = $data['messages'];
    $premierMessage = $data['premierMessage'];
    //var_dump($messages);

?>
<article class="uk-card uk-card-default uk-card-body">
    <h5 class="uk-card-title"><?=  $sujet ?></h5>
    <p>
        <p><strong><?=  $premierMessage->getTexte() ?></strong></p>
        <p>
            Créer par <strong><?=  $premierMessage->getVisiteur()?>, </strong> Date de Ajout <?=  $premierMessage->getDateDeCree('d/m/Y H:i:s') ?>
        </p>
    </p>
    
    </article>


 <table id='adminTable' class='uk-table uk-table-hover uk-table-divider'>
        <?php
            foreach($messages as $message){
        ?>
               
            <article class="uk-card uk-card-default uk-card-body">
                <h5 class="uk-card-title">Réponses :</h5>
                    <p> <strong> <?=  $message->getTexte() ?></strong><br>
                        cree par & Date d'ajout du message :
                        <strong><?=  $message ?></strong> </p>                      
            </article>
                <!-- https://getuikit.com/docs/icon -->
                
        <?php
        }
        ?>
    </tbody>
</table>
<form  id="add" action="?ctrl=Forumsubjet&action=addMessage&id=<?= $sujet->getId()?>" method="post">

<p>
    <label for="message">Text de message : </label><br>
    <textarea class="uk-textarea uk-form-width-large" id="message" name="texte"></textarea>
</p>
<p>
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <input class="uk-button uk-button-secondary" type="submit" name="submit" value="Creer le message">
</p>
</form>