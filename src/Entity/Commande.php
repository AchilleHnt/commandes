<?php 

namespace CmdApi\Entity;

use CmdApi\Enums\StatutCommande;


class Commande
{
    public function __construct(
        public int $id,
        public int $produit_id,
        public int $quantite,
        public StatutCommande $statut
    ){}
}