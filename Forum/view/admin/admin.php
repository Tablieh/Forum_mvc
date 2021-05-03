<?php
    use App\Core\Session;

    $sujets = $data['sujets'];
    $messages = $data['messages'];
    $utilisateurs = $data['utilisateurs'];
?>


<?php

    if(!$utilisateurs){
        ?>
        <p>Aucun utilisateur en base de données...</p>
        <?php
    }else{
        ?>
        <table class='uk-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Date fin de ban</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($utilisateurs as $utilisateur){
                    ?>
                    <tr>
                        <td><?= $utilisateur->getId() ?></td>
                        <td><?= $utilisateur?></td>
                        <td><?= $utilisateur->getFinBan("Y-m-d") ?></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    <?php
    }

?>