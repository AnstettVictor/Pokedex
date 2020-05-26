<?php

namespace Pokemon\Controllers;

class CoreController {

    /**
     * Pour choisir le template à afficher, on le passe en parametre.
     * @param string $viewName vue/template à afficher (home, products, store, ...)
     * @param array $viewVars
     * 
     * @return void
     */
    protected function show($viewName, $viewVars = array()) {
        global $router; 

        // $viewVars sera disponible dans tous les fichiers
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }

}