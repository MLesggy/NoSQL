<?php

require 'vendor/autoload.php';
require_once __DIR__ . '/../Models/produit.php';



$produitRequest = new ProduitRequest();
$listeProduits = $produitRequest->getProduits();

?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ECFnoSQL/styles/ajouterModal.css">
  <link rel="stylesheet" href="/ECFnoSQL/styles/acceuil.css">
  <title>Accueil</title>
</head>

<body>


  <table border="1">
    <thead>
      <tr>
        <th>Nom Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th> Voir produit</th>
        <th> Modifier produit</th>
        <th> Supprimer produit</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($produits)): ?>
        <?php foreach ($produits as $produit): ?>
          <tr>
            <td><?= htmlspecialchars($produit['nom'] ?? '') ?></td>
            <td><?= htmlspecialchars($produit['quantité'] ?? '') ?></td>
            <td><?= htmlspecialchars($produit['prix'] ?? '') ?></td>
            <td> <a href="index.php?action=edit&id=<?= $produit['_id'] ?>">👀 </a> </td>
            <td> <a href="index.php?action=edit&id=<?= $produit['_id'] ?>" >
              
              🖋️
              </a> 
            </td>
            <td> <a href="index.php?action=delete&id=<?= $produit['_id'] ?>"> ❌ </a> </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">Aucun produit trouvé.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <button onclick="create()" id="openModalBtn"> Ajouter un produit + </button>

</html>

<!-- Le modal pour ajouter -->
<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close" id="closeModalBtn">&times;</span>
    <h2>Ajouter un produit</h2>

    <form id="addProduitForm" method="post" action="index.php?action=create">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" required />

      <label for="quantite">Quantité</label>
      <input type="number" id="quantite" name="quantite" min="0" required />

      <label for="prix">Prix</label>
      <input type="number" id="prix" name="prix" min="0" step="0.01" required />
      <button type="submit"> Ajouter</button>

    </form>
  </div>

</div>



<script src="/ECFnoSQL/JS/ajouterProduitModal.js"></script>