<?php
require_once 'framework/modele.php';

class Recette extends Modele
{
    // Renvoie la liste des recettes du blog
    public function getRecettes()
    {
        $sql = 'select * from recette';
        $recettes = $this->executerRequete($sql)->fetchAll();
        return $recettes;
    }

    //Renvoie les informations sur une recette 
    public function getRecette($idRecette)
    {
        $sql = 'select * from recette'
            . ' where id = ?';
        $recette = $this->executerRequete($sql, array($idRecette))->fetch();
        return $recette;
    }

    // Renvoie les ingrédients d'une recette
    public function getIngredients($idRecette)
    {
        $sql = 'select * from ingredient'
            . ' where idRecette = ?';
        $ingredients = $this->executerRequete($sql, array($idRecette))->fetchAll();
        return $ingredients;
        }
}
