<?php 

namespace CmdApi\Contracts;

use CmdApi\Entity\Commande;
use CmdApi\Interfaces\Observateur;

trait Observable
{
    private array $observateurs = [];
    public function attacher(Observateur $o): void
    {
        $this->observateurs[] = $o;
    }
    protected function notifier(string $evenement, array|Commande $donnees = []): void
    {
        foreach ($this->observateurs as $o) {
            $o->surEvenement($evenement, $donnees);
        }
    }
}