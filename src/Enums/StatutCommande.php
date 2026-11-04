<?php 

namespace CmdApi\Enums;

enum StatutCommande : string
{
    case APPROVED = "validee";
    case PENDING = "en_attente";
    case STOPPED = "annulee";
}