<?php 

namespace CmdApi\Repository;

use CmdApi\Entity\Produit;

class ProduitRepo
{
    public function __construct(
        private \PDO $pdo
    ){}

    public function findById(int $id): Produit
    {
        $statement = $this->pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $statement->execute([$id]);
        $result = $statement->fetch();

        if(!$result) return NULL;

        return new Produit($result['id'],$result['nom'],$result['stock'],$result['prix']);
    }

    public function findAll() : array
    {
        $statement = $this->pdo->prepare("SELECT * FROM produits");
        $statement->execute();
        $result = $statement->fetchAll();

        if(!$result) return NULL;

        return $result;
    }

    public function diminuerStock(int $id, int $qte) : void 
    {
        $statement = $this->pdo->prepare("UPDATE produits SET stock = stock - ? WHERE id = ?");
        $statement->execute([$qte,$id]);
    }

    public function augmenterStock(int $id, int $qte) : void 
    {
        $statement = $this->pdo->prepare("UPDATE produits SET stock = stock + ? WHERE id = ?");
        $statement->execute([$qte,$id]);
    }
}