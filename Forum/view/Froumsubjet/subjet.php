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
            <h5 class="uk-card-title">
                <a href="?ctrl=Forumsubjet&action=voirsujets&id=<?= $sujets->getId() ?>">
                   
                </a>
            </h5>
            <p> <?= $sujets->getTitre() ?></p>
            <p><?= $sujets->getDateDeCree() ?></p>
           
            

        </article>
    <?php
    }
?>
</main>
   