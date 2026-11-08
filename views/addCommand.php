<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter d'une commande</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <h2>Ajout de commande</h2>
            <a href="/" class="btn-back">← Retour au menu</a>
        </div>
        <form action="/addCommand" method="post">

              <label for="produits">Produit</label>
                <select name="produits" id="">
                <?php 
                    foreach($allProducts as $s){
                        echo "<option value=". $s['id']. ">" .$s['nom']. "</option>";
                    }
                ?>
            </select><br>
            
            <label for="stock">Quantité</label>
            <input name="stock" type="int"><br>

            <label for="statut">Statut</label>
            <select name="statut" id="">
                <?php 
                    $statut =[
                        CmdApi\Enums\StatutCommande::APPROVED->value,
                        CmdApi\Enums\StatutCommande::PENDING->value,
                        CmdApi\Enums\StatutCommande::STOPPED->value
                    ] ;
                    foreach($statut as $s){
                        echo "<option value=$s>$s</option>";
                    }
                ?>
            </select>
           
            <button type="submit">Ajouter</button>
        </form>



        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST")  var_dump($data);
        ?>
    </div>
</body>
</html>