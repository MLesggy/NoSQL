<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ECFnoSQL/styles/modifierProduit.css">
  <title>Modifier un produit</title>
</head>
<body>

  <h1>Modifier le produit</h1>

  <form method="post" action="index.php?action=update">
    <!-- Champ caché pour l'ID du produit -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($produit['_id']) ?>">

    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required><br><br>

    <label for="quantite">Quantité :</label><br>
    <input type="number" id="quantite" name="quantite" min="0" value="<?= htmlspecialchars($produit['quantité']) ?>" required><br><br>

    <label for="prix">Prix :</label><br>
    <input type="number" id="prix" name="prix" step="0.01" min="0" value="<?= htmlspecialchars($produit['prix']) ?>" required><br><br>

    <button type="submit">Enregistrer les modifications</button>
  </form>

</body>
</html>