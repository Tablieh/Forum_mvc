<?php
    use App\Core\Session;
    
    $sujets = $data['sujets'];
  
    //var_dump($sujets);
?>
<h1>sujets</h1>
<main id="sujets-list" class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
<?php
    foreach($sujets as $sujet){
    ?>
        <article class="uk-card uk-card-default uk-card-body">
        <p>
            <h5 class="uk-card-title">
                <a href="?ctrl=Forumsubjet&action=showTopic&id=<?= $sujet->getId() ?>"><?= $sujet->getTitre() ?> 
                </a>
            </h5>
            <?= $sujet->getTitre() ?> 
            <?= $sujet->getDateDeCree() ?>
        </p>
        
            

        </article>
        
    <?php
    }
?>
<a href="?ctrl=Forumsubjet&action=addTopic">Add a subject
                </a>
</main>
   