<?php
    use App\Core\Session;
    
    $users = $data['users'];

    //var_dump($users);
?>

    
<main class="info" class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
<h1 class="tac"><strong>users</strong></h1>
<?php
    foreach($users as $user){
    ?>
        <article class="uk-card uk-card-default uk-card-body">
        <p>
        <h3 class="uk-card-title">
        <li>user : <?= $user ?></li> <br>
            </h3>
            
        </p>
        <li><a href="?ctrl=security&action=update&id=<?= $user->getId() ?>">Update Date</a><br></li>
        </article>
        
    <?php
    }
?>
</main>

