<?php

require_once 'modeles/recette.php';
require_once 'modeles/commentaire.php';
require_once 'framework/controller.php';
require_once 'framework/vue.php';

class ControllerRecette extends Controller
{
    private $recette;
    private $commentaire;
    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
        $recette = $this->recette->getRecette(1);
        $this->genererVue(array('recette' => $recette));
    }
    public function recette()
    {
        $id= $_GET['id'];
        $recette = $this->recette->getRecette($id);
        $ingredients = $this->recette->getIngredients($id);
        $commentaires = $this->commentaire->getCommentaires($_GET['id']);
        $this->genererVue(array('recette' => $recette,'ingredients' => $ingredients, 'commentaires' => $commentaires));

    }
    // Ajoute un commentaire à une recette
    public function commenter()
    {
        $this->commentaire->ajouterCommentaire($_GET['id'],$_POST['auteur'], $_POST['note'],$_POST['contenu']);
        // récupérer les paramètres (idRecette, auteur, contenu, note)
    }
}
