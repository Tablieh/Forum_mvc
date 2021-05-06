<?php
    use App\Core\Session;

    $sujet = $data['sujet'];
    $messages = $data['messages'];
    $premierMessage = $data['premierMessage'];
    //var_dump($messages);

?>
<body>
    

<article class="info" class="uk-card uk-card-default uk-card-body">
    <h1  class="msg" class="uk-card-title"><?=  $sujet ?></h1>
    <p>
    <li class="comment"><strong>Subject First Comment : <br><?=  $premierMessage->getTexte() ?></strong></li>
        <li>
            Crée par <strong><?=  $premierMessage->getVisiteur()?>, </strong><br>  et Date de Ajout : <?=  $premierMessage->getDateDeCree('d/m/Y H:i:s') ?>
        </li>
    </p>
    
    </article>


 <table id='adminTable' class='uk-table uk-table-hover uk-table-divider'>
        <?php
            foreach($messages as $message){
        ?>
               <h4 class="info" class="uk-card-title"><strong>Réponses :</strong> </h4>
            <article class="info" class="uk-card uk-card-default uk-card-body">
                
                    <li class="comment"> <strong> <?=  $message->getTexte() ?></strong></li> <br>
                    <li>Crée par :
                        <strong><?=  $message ?></strong></li>
                                             
            </article>
                <!-- https://getuikit.com/docs/icon -->
                
        <?php
        }
        ?>
    </tbody>
</table>
<form  class="info" action="?ctrl=Forumsubjet&action=addMessage&id=<?= $sujet->getId()?>" method="post">

<p>
    <label for="message">Text de message : </label><br>
    <textarea class="uk-textarea uk-form-width-large" id="message" name="texte"></textarea>
</p>
<p>
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <input class="uk-button uk-button-secondary" type="submit" name="submit" value="Creer le message">
</p>
</form>
</body>