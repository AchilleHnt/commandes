<?php 

use CmdApi\Database\Database;
use CmdApi\Repository\CommandeRepo;
use CmdApi\Repository\ProduitRepo;
use CmdApi\Router\Router;
use CmdApi\Services\CommandeService;
use CmdApi\Services\LogService;
use CmdApi\Services\SmsService;


require '../vendor/autoload.php';



define('BASE_VIEW_PATH' , dirname(__DIR__). DIRECTORY_SEPARATOR. 'views'. 
DIRECTORY_SEPARATOR);

$r = new Router();
$r->register('/',["CmdApi\Controller\HomeController","home"]);
$r->register('/produits',["CmdApi\Controller\ProduitController","lister"]);

$r->register('/commandes',["CmdApi\Controller\CommandeController","lister"]);
$r->register('/valider',["CmdApi\Controller\CommandeController","valider"]);
$r->register('/annuler',["CmdApi\Controller\CommandeController","annuler"]);

$uri = $_SERVER["REQUEST_URI"];
$r->resolve($uri);




























// echo ".\n Anullation Commande 2"."\n";
// $service->annuler(2);
// $res2 =  $produitRepo->findById(1);
// echo "\n Produit restant ". $res->nom. " :" .$res->stock;


// $service->valider(1);
// var_dump($service);

// $sms->surEvenement("commande.validee",['id'=> 12]);