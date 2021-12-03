<?php
// var_dump($recettes);
foreach($recettes as $recette){
    ?>
    <div id="global">
    <article>
        <header>
            <img class="imgRecette" src="img/<?=$recette['photo']?>" width="300px" height="242px" alt="Tartiflette" />
            <a href="index.php?controller=recette&action=recette&id=id tartiflette">
                <h1 class="titreRecette">
                    <?=$recette['titre']?>
                </h1>
            </a>
            <time>
                <?=substr($recette['dateCreation'],0,11)?>
            </time>
        </header>
        <p>
            <?=$recette['description']?>
        </p>
    </article>
    <hr />
</div>
<?php
}
?>
