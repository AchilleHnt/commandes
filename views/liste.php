<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <h2>Liste des Commandes</h2>
            <a href="/" class="btn-back">← Retour au menu</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>ID Produit</th>
                    <th>Quantité</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($all as $c) :?>
                    <?php $id = $c['id']; ?>
                    <tr>
                        <td><strong>#<?= htmlspecialchars($c['id']) ?></strong></td>
                        <td><?= htmlspecialchars($c['produit_id']) ?></td>
                        <td><?= htmlspecialchars($c['quantite']) ?></td>
                        <td><?= htmlspecialchars($c['statut']) ?></td>
                        
                        <td>
                            <a href='/valider?id=<?= $id ?>' class="btn-action btn-valider">Valider</a>
                            <a href='/annuler?id=<?= $id ?>' class="btn-action btn-annuler">Annuler</a>
                            <a href='/supprimer?id=<?= $id ?>' class="btn-action btn-supprimer">Supprimer</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>