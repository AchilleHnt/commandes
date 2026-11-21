<?php

use CmdApi\Database\Database;
use CmdApi\Repository\CommandeRepo;
use CmdApi\Repository\ProduitRepo;
use CmdApi\Router\Router;
use CmdApi\Services\CommandeService;
use CmdApi\Services\LogService;
use CmdApi\Services\SmsService;

require '../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views'
    . DIRECTORY_SEPARATOR);

try {
    $r = new Router();
    $r->register('/', ['CmdApi\Controller\HomeController', 'home']);
    $r->register('/favicon.ico', []);

    $r->register('/produits', ['CmdApi\Controller\ProduitController', 'lister']);
    $r->register('/addProduits', ['CmdApi\Controller\ProduitController', 'addProduits']);
    $r->register('/commandes', ['CmdApi\Controller\CommandeController', 'lister']);
    $r->register('/valider', ['CmdApi\Controller\CommandeController', 'valider']);
    $r->register('/annuler', ['CmdApi\Controller\CommandeController', 'annuler']);
    $r->register('/addCommand', ['CmdApi\Controller\CommandeController', 'addCommand']);
    $r->register('/supprimer', ['CmdApi\Controller\commandeController','deleteCommand']);

    $uri = $_SERVER['REQUEST_URI'];
    $r->resolve($uri);
} catch (\Throwable $th) {
    http_response_code(500);
    $message = $th->getMessage();
    require __DIR__ . '/../views/error.php'; 
    exit;

}
