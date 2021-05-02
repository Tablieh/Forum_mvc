<?php
    $ForumSubjet = $result['data']['ForumSubjet'];
?>

<h1>ForumSubjet</h1>

<main id="ForumSubjet-list">
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>DateDeCree</th>
                <th>supr&add</th>
            </tr>
        </thead>
        <tbody>
        
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
        </tbody>
    </table>
</main>