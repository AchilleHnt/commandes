<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <h2>Liste des Produits</h2>
            <a href="/" class="btn-back">← Retour au menu</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Produit</th>
                    <th>Nom</th>
                    <th>Stock</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($all as $c) :?>
                    <tr>
                        <td><strong>#<?= htmlspecialchars($c['id']) ?></strong></td>
                        <td><?= htmlspecialchars($c['nom']) ?></td>
                        <td><?= htmlspecialchars($c['stock']) ?></td>
                        <td><?= htmlspecialchars($c['prix']) ?> FCFA</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>