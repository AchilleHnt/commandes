<?php  

namespace CmdApi\Entity;

class Produit
{
    public function __construct(
        public int $id,
        public string $nom,
        public int $stock,
        public int $prix
    ){}
}