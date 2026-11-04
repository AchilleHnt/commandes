<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h2>La liste des Produits</h2>

     <table border="1">
        <thead>
            <tr>
                <th>Id De Produit</th>
                <th>Nom</th>
                <th>Stock</th>
                <th>Prix</th>
            </tr>
            
        </thead>

        <tbody>
            
            <?php foreach($all as $c) :?>
                <?php $id = $c['id']?>
                <tr>
                    <td><?= $c['id']?></td>
                    <td><?= $c['nom']?></td>
                    <td><?= $c['stock']?></td>
                    <td><?= $c['prix']?></td>
                    <!-- <td>
                       <?php echo "<a href='/valider?id=$id'>Valider</a>"; ?>
                        <?php echo "<a href='/annuler?id=$id'>Annuler</a>"; ?>

                    </td> -->
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</body>
</html>