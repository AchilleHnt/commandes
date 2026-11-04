<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>La liste des Commandes</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Id De Commande</th>
                <th>Id De Produit</th>
                <th>Quantité</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            
        </thead>

        <tbody>
            
            <?php foreach($all as $c) :?>
                <?php $id = $c['id']?>
                <tr>
                    <td><?= $c['id']?></td>
                    <td><?= $c['produit_id']?></td>
                    <td><?= $c['quantite']?></td>
                    <td><?= $c['statut']?></td>
                    <td>
                       <?php echo "<a href='/valider?id=$id'>Valider</a>"; ?>
                        <?php echo "<a href='/annuler?id=$id'>Annuler</a>"; ?>

                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
    
</body>
</html>