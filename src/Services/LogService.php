<?php

namespace CmdApi\Services;

use CmdApi\Entity\Commande;
use CmdApi\Interfaces\Observateur;


class LogService implements Observateur
{
    public function surEvenement(string $evenement, array|Commande $donnees): void
    {
        $date = date("Y-m-d H:i:s");
        $message = "[$date] Evenement : $evenement | Commande: #{$donnees->id} | Produit: #{$donnees->produit_id}\n";
        file_put_contents(__DIR__."/../../logs/log.log",$message,FILE_APPEND);
    }
}