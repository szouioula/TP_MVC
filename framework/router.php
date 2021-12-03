<?php

require_once 'requete.php';
require_once 'vue.php';

class Routeur
{

    //Route une requête entrante: éxecute l'action associée
    public function routerRequete()
    {
        try {
            // Fusion des paramètres GET et POST de la requête
            $requete = new requete(array_merge($_GET, $_POST));
            $controller = $this->creerController($requete);
            $action = $this->creerAction($requete);

            $controller->executerAction($action);
        } catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerController(Requete $requete)
    {
        $controller = "Accueil"; // Contrôleur par défaut
        if ($requete->existeParametre('controller')) {
        
        $controller = $requete->getParametre('controller');
        // Première lettre en majuscule
        $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        $classeController = "Controller" . $controller;
        $fichierController = "controllers/" . $classeController . ".php";
        if (file_exists($fichierController)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierController);
            $controller = new $classeController();
            $controller->setRequete($requete);
            return $controller;
        } else
            throw new Exception("Fichier '$fichierController' introuvable");
    }
    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(requete $requete)
    {
        $action = "index"; // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }
    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception)
    {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}
