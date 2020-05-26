<?php

namespace Pokemon\Controllers;

/**
 * CoreController est la classe parente de tous les
 * controllers.    ......
 */
class CoreController {

    /**
     * Elle affiche le template demandé.
     * 
     * Elle ne retourne rien.
     * 
     * Pour choisir le template à afficher, on le passe en parametre.
     * @param string $viewName vue/template à afficher (home, products, store, ...)
     * @param array $viewVars
     * 
     * @return void
     */
    protected function show($viewName, $viewVars = array()) {
       
        // Ici, on récupère les données qui seront TOUJOURS nécessaires
       

        global $router; // c'est sale, mais pour l'instant on a pas mieux

        // Ensuite on require les template
        // $viewVars sera disponible dans tous les fichiers
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }

}