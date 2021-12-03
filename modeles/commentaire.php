<?php
require_once 'framework/modele.php';
class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à une recette
    public function getCommentaires($idRecette)
    {
        $sql = 'select * from commentaire'
            . ' where id = ?';
        $commentaire = $this->executerRequete($sql, array($idRecette))->fetchAll();
        return $commentaire;
    }
    public function ajouterCommentaire($idRecette, $auteur, $contenu, $note)
    {
        $sql = 'INSERT INTO commentaire (idRecette,auteur,contenu,note,dateCreation) VALUES(?,?,?,?,?)';
        $this->executerRequete($sql, array($idRecette, $auteur, $contenu, $note));
    }
}
