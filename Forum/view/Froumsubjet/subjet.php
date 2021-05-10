<?php
    use App\Core\Session;
    
    $sujets = $data['sujets'];

    //var_dump($sujets);
?>

    
<main class="info" class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
<h1 class="tac"><strong>All Subject</strong></h1>
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
           Made In : <?= $sujet->getDateDeCree() ?><br>

            <td><?= $sujet->getLocked() ? "verrouillé" :"ouvert" ?></td>

            <td><a data-lock="<?= $sujet->getLocked() ?>" class="locklink" href="?ctrl=Forumsubjet&action=lock&id=<?= $sujet->getId() ?>" >

                <i class="fas <?= $sujet->getLocked() ? 'fa-lock' :'fa-lock-open' ?>"> </i></a>

            </td>
        </p>
        
        <?php 
        if(Session::get("user") && Session::get("user")->hasRole("ROLE_ADMIN")){ ?>
            <a href="?ctrl=Forumsubjet&action=delTopic&id=<?= $sujet->getId() ?>">  <i class="fas fa-trash"> Delete Topic</i> </a>
            <?php }?>
        </article>
        
    <?php
    }
?>
</main>
