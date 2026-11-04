<?php 

namespace CmdApi\Services;

use CmdApi\Entity\Commande;
use CmdApi\Interfaces\Observateur;

class SmsService implements Observateur
{
    public function surEvenement(string $evenement, array|Commande $donnees): void
    {
        if($evenement == "commande.validee") {
            echo "SMS : Commande ".$donnees->id." validée";
        }
        if($evenement == "commande.annulée") {
            echo "SMS : Commande ".$donnees->id." annulee";
        }
    }
}