<?php
namespace App\Controller;

use App\Core\AbstractController as AC;
use App\Model\Manager\ForumsubjetManager;
use App\Model\Manager\MessagesManager;
use App\Model\Manager\VisiteurManager;

class AdminController extends AC
{
    public function __construct(){
        $this->managerS = new ForumsubjetManager();
        $this->managerM = new MessagesManager();
        $this->managerU = new VisiteurManager();
    }

    public function index(){
        $sujets = $this->managerS->getAll();
        $messages = $this->managerM->getAll();
        $utilisateurs = $this->managerU->getAll();

        return $this->render("admin/admin.php", [
            "sujets" => $sujets,
            "messages" => $messages,
            "utilisateurs" => $utilisateurs,
            "title"    => "Administration"
        ]);
    }

}