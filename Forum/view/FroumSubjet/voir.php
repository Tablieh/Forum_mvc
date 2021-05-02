<?php
namespace App;

$ForumSubjet = $result['data']['ForumSubjet'];
$comment = $result['data']['comment'];
$Visiteur = $result['data']['Visiteur'];
?>
<body>
    
    <h1><?= $Subjet->getTitre()?></h1>
   
    <h1 id="subject">subject </h1>
    <div class="content" >
    
    <p>
        
    <?php
                foreach ($ForumSubjet as $Subjet) { ?>
                    <tr>
                        <td><a href="?ctrl=ForumSubjet&action=voirForumSubjet&id=<?= $Subjet->getId_forum() ?>"><?= $Subjet->getTitre()?></a></td>
                        <td><?= $Subjet->getDateDeCree() ?></td>
                        

                        <a href="#" class="uk-icon-link" uk-icon="trash"></a>
                        <a href="#" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                        </td>
                    </tr>    
                    <?php  } ?>   
    </p>
    </div>
    <div id="comment" class="uk-card uk-card-default uk-card-small uk-card-body">
                <?php
                foreach ($Visiteur as $vs) { ?>
                    <articl class="uk-card uk-card-default uk-card-body">
                    <h5>
                    par <?= $vs->getPesudo() ?> <br>
                    le <strong><?= $vs->getDateDeCree() ?></strong><br>
                    </h5>
                    <?php  } ?>
        <?php
                if($comment)
                foreach ($comment as $cm) { ?>
                    <articl class="uk-card uk-card-default uk-card-body">
                    <h5>
                    comment : <strong> <?= $cm->getTexte() ?> </strong><br>
                    le <strong><?= $cm->getDateDeCree() ?></strong><br>
                    </h5><br>
                    <img class="img" src="<?= $cm->getImages() ?>" alt="img">
                    <?php  } ?>   
                
    </div><br>
    
    
</body>



