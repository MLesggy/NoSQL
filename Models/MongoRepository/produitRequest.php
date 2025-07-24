<?php
require 'vendor/autoload.php';
require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../produit.php';

use MongoDB\Client;
use MongoDB\BSON\ObjectId;

class ProduitRequest
{

    // Attributs
    private $collection;
    // Constructeur 
    public function __construct()
    {
        // Connexion à MongoDB
        $produit = new Client("mongodb://localhost:27017");
        $this->collection = $produit->ECF->Produits;
    }

    // Methode
    // Recuperer tout les produits
    public function getProduits()
    {
        $cursor = $this->collection->find();

        // Convertit le curseur en tableau
        $produits = iterator_to_array($cursor);

        return $produits;
    }

    public function getProduitById($id)
    {
        return $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
    // CRUD 

    // Ajouter un produit 
    public function createProduit(Produit $produit)
    {

        $data = [
            'nom' => $produit->getNom_produit(),
            'prix' => $produit->getPrix_produit(),
            'quantité' => $produit->getQuantite_produit()
        ];

        try {
            $this->collection->insertOne($data);
            echo "<font color='green'>Produit ajouté avec succès.</font>";
        } catch (Exception $e) {
            echo "<font color='red'>Erreur : " . $e->getMessage() . "</font>";
        }
    }

    // Modifier un produit 
    public function update(Produit $produit)
    {
        $data = [
            'nom' => $produit->getNom_produit(),
            'prix' => $produit->getPrix_produit(),
            'quantité' => $produit->getQuantite_produit()
        ];

        $modif = $this->collection->updateOne(
            ['_id' => new ObjectId($produit->getID_produit())],
            ['$set' => $data]
        );
        return $modif->getModifiedCount();

    }
    public function delete(Produit $produit)
    {
          try {
        $result = $this->collection->deleteOne([
            '_id' => new ObjectId($produit->getID_produit())
        ]);

        return $result->getDeletedCount(); // retourne 1 si suppression réussie
    } catch (Exception $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
        return 0;
    }
    }
}

