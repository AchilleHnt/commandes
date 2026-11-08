<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <h2>Ajout de Produit</h2>
            <a href="/" class="btn-back">← Retour au menu</a>
        </div>
        <form action="/addProduits" method="post">

            <label for="nom">Nom</label>
            <input name="nom" type="text"><br>
            
            <label for="stock">Stock</label>
            <input name="stock" type="int"><br>

            <label for="prix">Prix</label>
            <input name="prix" type="int"><br>

            <button type="submit">Ajouter</button>
        </form>



        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST")  var_dump($data);
        ?>
    </div>
</body>
</html>