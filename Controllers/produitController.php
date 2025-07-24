<?php

require_once __DIR__ . '/../Models/produit.php';
require_once __DIR__ . '/../Models/MongoRepository/produitRequest.php';

class ProduitController
{

  // Recuperer tout les produits
  public function getListeProduit()
  {
    $produitRequest = new ProduitRequest();
    $produits = $produitRequest->getProduits();
    require_once __DIR__ . '/../View/acceuil.php';
  }

  // CRUD

 public function create()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Sécurité minimale : vérifie que les champs existent
        if (isset($_POST['nom'], $_POST['prix'], $_POST['quantite'])) {

            // Création d'un nouvel objet Produit
            $produit = new Produit(
                $_POST['nom'],
                floatval($_POST['prix']),       
                intval($_POST['quantite'])   
            );

            // Instanciation MongoDB
            $produitRequest = new ProduitRequest();

            // Enregistrement du produit
            $produitRequest->createProduit($produit);

            // Redirection ou message de confirmation
            header("Location: index.php");
            exit;

        } else {
            echo "<p style='color:red;'>Tous les champs sont requis.</p>";
        }
    }
}

    // Affiche la vue du formulaire 
public function edit()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $produitRequest = new ProduitRequest();
        $produit = $produitRequest->getProduitById($id);

        if ($produit) {
            require_once __DIR__ . '/../View/modifierProduit.php';
        } else {
            echo "Produit non trouvé.";
        }
    } else {
        echo "ID non spécifié.";
    }
}

  // Modification 
  public function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['id'], $_POST['nom'],$_POST['prix'], $_POST['quantite'])) {

            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prix = floatval($_POST['prix']);
            $quantite = intval($_POST['quantite']);
          

            $produit = new Produit($id, $nom, $prix, $quantite);

            $produitRequest = new ProduitRequest();
            $produitRequest->update($produit);

            header("Location: index.php");
            exit;

        } else {
            echo "<p style='color:red;'>Tous les champs sont requis pour la modification.</p>";
        }
    }
}

  // Deletion 
  public function delete()
  {
     if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $produit = new Produit($id, '', 0, 0);

        $produitRequest = new ProduitRequest();
        $produitRequest->delete($produit);

        header("Location: index.php");
        exit;
    } else {
        echo "ID non spécifié pour la suppression.";
    }
  }



}