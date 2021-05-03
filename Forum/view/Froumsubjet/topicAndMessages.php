<?php
    use App\Core\Session;

    $sujet = $data['sujet'];
    $messages = $data['messages'];
    $premierMessage = $data['premierMessage'];

?>
<article class="uk-card uk-card-default uk-card-body">
    <h5 class="uk-card-title"><?=  $sujet ?></h5>
    <p>
        <p><?=  $premierMessage->getTexte() ?></p>
        <p>
            Créer par <strong><?=  $premierMessage->getUtilisateur() ?>, </strong> <?=  $premierMessage->getDateDeCree('d/m/Y H:i:s') ?>
        </p>
    </p>
    <div>
        <p><a class="uk-button uk-button-small uk-button-primary" href="?ctrl=ForumSubjet&action=addMessage&id=<?=  Session::get("user")->getId() ?>">Répondre</a></p>
    </div>
</article>


 <table id='adminTable' class='uk-table uk-table-hover uk-table-divider'>
    <thead>
        <tr>
            <th>Réponses</th>
            <th>Date de message</th>
            <th>Auteur</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($messages as $message){
        ?>       
            <tr>
                <td><?=  $message->getTexte() ?></td>
                <td><?=  $message->getDateDeCree('d/m/Y H:i:s') ?> </td>
                <td><?=  $message->getVisiteur() ?> </td>
                <!-- https://getuikit.com/docs/icon -->
                <td>
                    <a class="uk-icon-link uk-margin-small-right" uk-icon="file-edit" href="?ctrl=admin&action=upDatemessage&id=<?=  $message->getId() ?>"></a>
                    <a class="uk-icon-link" uk-icon="trash" href="?ctrl=admin&action=deletemessage&id=<?=  $message->getId() ?>"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>