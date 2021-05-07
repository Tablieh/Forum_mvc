<?php
    use App\Core\Session;
    
    $sujets = $data['sujets'];

    //var_dump($sujets);
?>

    
<main class="info" class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
<h1 class="tac"><strong>Sujets</strong></h1>
<a href="?ctrl=Forumsubjet&action=newTopic"><strong>Add a subject</strong> </a>
<?php
    foreach($sujets as $sujet){
    ?>
        <article class="uk-card uk-card-default uk-card-body">
        <p>
            <h5 class="uk-card-title">
                <a href="?ctrl=Forumsubjet&action=showTopic&id=<?= $sujet->getId() ?>"><?= $sujet->getTitre() ?> 
                </a>
            </h5>
            Supject Name : <?= $sujet->getTitre() ?> <br>
           Made In : <?= $sujet->getDateDeCree() ?>
        </p>
        
        <?php 
        if(Session::get("user") && Session::get("user")->hasRole("ROLE_ADMIN")){ ?>
            <a href="?ctrl=Forumsubjet&action=delTopic&id=<?= $sujet->getId() ?>"> Delete Topic </a>
            <?php }?>
        </article>
        
    <?php
    }
?>
</main>

   