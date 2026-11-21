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

    public function addProduits()
    {
        $pdo = Database::getInstance()->pdo();
        $produit = new ProduitRepo($pdo);
        $allProduits = $produit->findAll();

        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {

            $nom = trim($_POST['nom']);
            if($nom === '') throw new \Exception("Le nom doit pas être vide");
            $stmt = $pdo->prepare("SELECT 1 FROM produits WHERE nom = ? LIMIT 1");
            $stmt->execute([$nom]);

            $stock = filter_var($_POST['stock'], FILTER_VALIDATE_INT);
            if ($stock === false) throw new \Exception('Le stock doit être un entier');

            $prix = filter_var($_POST['prix'], FILTER_VALIDATE_INT);
            if($prix === false) throw new \Exception("Le prix doit être un entier");


            if ($stmt->fetch()) {
                throw new \Exception("Ce produit existe déjà");
            }   
            $data = [
                'nom' => $nom,
                'stock' => $stock,
                'prix' => $prix
                
            ];
  
            $produit->addProduits($data);
            var_dump($data);
            header('Location: /addProduits');
        }

        require BASE_VIEW_PATH."addProduits.php";
    }

    
}