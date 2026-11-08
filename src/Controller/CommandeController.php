<?php 

namespace CmdApi\Controller;

use CmdApi\Database\Database;
use CmdApi\Repository\CommandeRepo;
use CmdApi\Repository\ProduitRepo;
use CmdApi\Services\CommandeService;
use CmdApi\Services\LogService;
use CmdApi\Services\SmsService;


class CommandeController
{
    
    public function lister()
    {
        $pdo = Database::getInstance()->pdo();
        $cmdRepo = new CommandeRepo($pdo);
        $produitRepo = new ProduitRepo($pdo);

        $service = new CommandeService($cmdRepo,$produitRepo);
        $all = $service->commande->findAll();

        $filePath = BASE_VIEW_PATH . "liste.php";
        // var_dump(explode("?","valider?id=2"));
        if (file_exists($filePath)) {
            require_once $filePath;
        } else {
            http_response_code(404);
            echo "Vue introuvable : " . $filePath;
        }
    }

    public function valider($params)
    {
        $id = $params['id'] ?? NULL;
        $pdo = Database::getInstance()->pdo();
        $cmdRepo = new CommandeRepo($pdo);
        $produitRepo = new ProduitRepo($pdo);

        $service = new CommandeService($cmdRepo,$produitRepo);
        $sms = new SmsService();
        $logs = new LogService();

        $service->attacher($sms);
        $service->attacher($logs);

        $service->valider($id);
        header("location:/commandes");
    }

    public function annuler($params)
    {
        $id = $params['id'] ?? NULL;
        $pdo = Database::getInstance()->pdo();
        $cmdRepo = new CommandeRepo($pdo);
        $produitRepo = new ProduitRepo($pdo);

        $service = new CommandeService($cmdRepo,$produitRepo);
        $sms = new SmsService();
        $logs = new LogService();

        $service->attacher($sms);
        $service->attacher($logs);

        $service->annuler($id);
        header("location:/commandes");
    }

    public function addCommand()
    {
        $pdo = Database::getInstance()->pdo();
        $cmdRepo = new CommandeRepo($pdo);
        $produitRepo = new ProduitRepo($pdo);

        $allProducts = $produitRepo->findAll();


        if($_SERVER['REQUEST_METHOD']=== 'POST' && !empty($_POST)) {
            $data = $_POST;
        }
        require BASE_VIEW_PATH."addCommand.php";
    }
}