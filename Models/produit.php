<?php

require_once __DIR__ . '/../lib/database.php';

class Produit
{
    // Attributs
    private string $id_produit;
    private string $nom_produit;
    private int $quantite_produit;
    private int $prix_produit;

    // Getter 
    public function getID_produit(): string{
        return $this->id_produit;
    }
    public function getNom_produit(): string
    {
        return $this->nom_produit;
    }
    public function getQuantite_produit(): int
    {
        return $this->quantite_produit;
    }
    public function getPrix_produit(): int
    {
        return $this->prix_produit;
    }

    // Setter 

    public function setID_produit(string $id_produit): void
    {
        $this->id_produit = $id_produit;
    }
    public function setNom_produit(string $nom_produit): void
    {
        $this->nom_produit = htmlspecialchars($nom_produit);
    }
    public function setQuantite_produit(int $quantite_produit): void
    {
        $this->quantite_produit = $quantite_produit;
    }
    public function setPrix_produit(int $prix_produit): void
    {
        $this->prix_produit = $prix_produit;
    }

    public function hydrate(array $data): void
    {
        $this->setNom_produit($data['nom_produit'] ?? '');
        $this->setPrix_produit($data['prix_produit'] ?? 0);
        $this->setQuantite_produit($data['quantite_produit'] ?? 0);
    }

    // methodes 
    private $request;

    public function __construct(string $id_produit = "", string $nom_produit = "", int $prix_produit = 0, int $quantite_produit = 0)
    {   
        $this->setID_produit($id_produit);
        $this->setNom_produit($nom_produit);
        $this->setPrix_produit($prix_produit);
        $this->setQuantite_produit($quantite_produit);
    }

  
}