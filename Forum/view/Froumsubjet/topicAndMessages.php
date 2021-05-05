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
        <p><?=  $premierMessage->getTexte() ?></p>
        <p>
            Créer par <strong><?=  $premierMessage->getVisiteur()?>, </strong> Date de Ajout <?=  $premierMessage->getDateDeCree('d/m/Y H:i:s') ?>
        </p>
    </p>
    <div>
        <p><a class="uk-button uk-button-small uk-button-primary" href="?ctrl=Message&action=newMessage">Répondre</a></p>
    </div>
    </article>


 <table id='adminTable' class='uk-table uk-table-hover uk-table-divider'>
    
    
        <?php
            foreach($messages as $message){
        ?>
               
            <article class="uk-card uk-card-default uk-card-body">
                <h5 class="uk-card-title">Réponses :</h5>
                    <p> <?=  $message->getTexte() ?><br>
                        cree par & Date d'ajout du message :
                        <?=  $message ?> </p>
                        
            </article>
                <!-- https://getuikit.com/docs/icon -->
                
        <?php
        }
        ?>
    </tbody>
</table>