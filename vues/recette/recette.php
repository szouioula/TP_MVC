<?php
//var_dump($recette);
var_dump($commentaires);
?>

<div id="global">
    <article>
        <header>
            <img class="imgRecette" src="img/<?=$recette['photo']?>" alt="<?=$recette['titre']?>" />
            <h1 class="titreRecette">
                <?=$recette['titre']?>
            </h1>
            <time>
            <?=substr($recette['dateCreation'],0,11)?>
            </time>
        </header>
        <p>
        <?=$recette['description']?>
        </p>
    </article>
    <hr />
    <header>
        <h2 id="titreIngredient">
            Ingrédients
        </h2>
        <ul>
<?php
foreach($ingredients as $element){
?>
    <li><?=$element['quantite']?> <?=$element['unit']?> <?=$element['nom']?></li>
<?php
}
?>
        </ul>
    </header>
    <h2 id="titreCommentaire">
        Commentaires
    </h2>
    <div class="divCommentaire">
        <?php 
            foreach($commentaires as $commentaire){ 
        ?>
        <p><?=$commentaire['auteur']?> : <?=$commentaire['contenu']?> </p>
        <p> Note : <?=$commentaire['note']?>/5 </p>
        <p>
            <?= $commentaire['dateCreation']?>
        </p>
        <hr>
        <?php 
        } 
        ?>
    </div>
    <form method="post" action="index.php?controller=recette&action=commenter&id=<?$recette['id']?>">
        <input id="auteur" name="auteur" type="text" placeholder="Votre Nom" /><br />
        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"></textarea><br />
        <label for="note">Note</label><br />
        <select name="note" id="note">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br />
        <input type="submit" value="Commenter" />
    </form>
    
    </div>
