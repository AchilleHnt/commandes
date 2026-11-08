<?php

namespace CmdApi\Services;

use CmdApi\Contracts\Observable;
use CmdApi\Enums\StatutCommande;
use CmdApi\Repository\CommandeRepo;
use CmdApi\Repository\ProduitRepo;

class CommandeService
{
    use Observable;
    public function __construct(
        public CommandeRepo $commande,
        public ProduitRepo $produit
    ){}

    public function valider(int $cmdId)
    {
        $commande = $this->commande->findById($cmdId);
        $produit = $this->produit->findById($commande->produit_id);

        if($produit->stock < $commande->quantite) {
            throw new \Exception("Stock Insuffissant");
        }

        $this->produit->diminuerStock($produit->id, $commande->quantite);
        $this->commande->updateStatut($cmdId, StatutCommande::APPROVED);
        if($commande->statut == StatutCommande::PENDING) 
        {
            $this->commande->updateStatut($cmdId, StatutCommande::APPROVED);
        }
        $this->notifier("commande.validee",$commande);
    }

    public function annuler(int $cmdId)
    {
        $commande = $this->commande->findById($cmdId);
        $produit = $this->produit->findbyId($commande->produit_id);

        if($commande->statut == StatutCommande::APPROVED) {
            $this->commande->updateStatut($cmdId, StatutCommande::STOPPED);
            $this->produit->augmenterStock($produit->id, $commande->quantite);
        }

        $this->notifier("commande.annulee",$commande);
    }

    // public function addCommand()
}
   


    

   