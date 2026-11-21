<?php 

namespace CmdApi\Repository;

use CmdApi\Entity\Commande;
use CmdApi\Enums\StatutCommande;

class CommandeRepo
{
    public function __construct(
        private \PDO $pdo
    ){}

    protected function getPDO() : \PDO 
    {
        return static::$pdo;
    }
    public function findById(int $id): Commande|array
    {
        $statement = $this->pdo->prepare("SELECT * FROM commandes WHERE id = ?");
        $statement->execute([$id]);
        $result = $statement->fetch();

        if(!$result) return [];

        return new Commande(
            $result['id'],
            $result['produit_id'],
            $result['quantite'],
            StatutCommande::from($result['statut'])
        );
    }

    public function findAll() : array
    {
        $statement = $this->pdo->prepare("SELECT * FROM commandes");
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(!$result) return [];

        return $result;
    }

    public function updateStatut(int $id, StatutCommande $statut)
    {
        $statement = $this->pdo->prepare("UPDATE commandes SET statut = ? WHERE id = ?");
        $statement->execute([$statut->value,$id]);
    }

    public function findByStatut(StatutCommande $statut) : array
    {
        $statement = $this->pdo->prepare("SELECT * FROM commandes WHERE statut = ?");
        $statement->execute([$statut->value]);
        $result = $statement->fetchAll();
    }

    public function addCommand(array $commande): void
    {
        $statement = $this->pdo->prepare("INSERT INTO commandes (produit_id,quantite,statut) VALUES (?, ?, ?)");
        $statement->execute([
            $commande['produit_id'],
            $commande['quantite'],
            $commande['statut']
        ]);
    }
    
    public function deleteCommand(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM commandes WHERE id = ?");
        $statement->execute([$id]);
    }
}