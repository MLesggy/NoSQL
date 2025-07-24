<?php 


require 'vendor/autoload.php';

require_once __DIR__ . '/Models/produit.php';
require_once __DIR__. '/Controllers/produitController.php';


$produitController = new ProduitController(); 


// Debut du routeur
$action = $_GET['action'] ?? 'getProduits'; 

switch($action){
    // Envoie à la page d'acceuil avec la vue du tableau de produit
    case 'getProduits': 
        $produitController->getListeProduit();
        break;
    // Partie CRUD
    case 'create':
        $produitController->create();
        break;
    case 'edit':
        $produitController->edit();
        break;
    case 'update':
        $produitController->update();
        break;
    case 'delete':
        $produitController->delete();
        break;
}
