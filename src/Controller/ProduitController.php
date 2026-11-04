<?php

namespace CmdApi\Controller;

use CmdApi\Database\Database;
use CmdApi\Repository\CommandeRepo;
use CmdApi\Repository\ProduitRepo;
use CmdApi\Services\CommandeService;

class ProduitController
{
    public function lister()
    {   
        $pdo = Database::getInstance()->pdo();
        $commande = new CommandeRepo($pdo);
        $produit = new ProduitRepo($pdo);

        $service = new CommandeService($commande,$produit);

        $all = $service->produit->findAll();

        require BASE_VIEW_PATH."produit.php";
    }
}