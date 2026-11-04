<?php 

namespace CmdApi\Interfaces;

interface Observateur
{
    public function surEvenement(string $evenement, array $donnees): void;
}