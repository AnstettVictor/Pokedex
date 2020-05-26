<?php

use \Pokemon\Controllers\MainController;

// Je charge le systeme de loading, de chargement de
// Composer
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/Utils/Database.php";
// J'utilise cette espace de nom

// Je récupère mon pdo pour manipuler BDD
// Test de connexion à la base de donnée
// $pdo = Database::getPDO();

// $statement = $pdo->query('select name from product');
// dump($statement->fetchAll(PDO::FETCH_ASSOC));
// exit;

// J'instancie AltoRouter
$router = new AltoRouter();

// Je vais utiliser mon MainController avec mon router
// tout beau tout neuf

// Configuration du router
$router->setBasePath($_SERVER['BASE_URI']);



$router->map(
    // la methode HTTP utilisée
    'GET',
    // quelle route on veut écouter/cartographier
    '/',
    // Infos supplémentaires qui seront envoyées au controller
    // ici on stocke la méthode du controller qu'on va appeler
    // Mais aussi, le controller qui va être appelé
    [
        'method' => 'home',
        'controller' => 'MainController'
    ],    
    // Nom de la route, c'est completement arbitraire
    'home');

    $router->map(
        // la methode HTTP utilisée
        'GET',
        // quelle route on veut écouter/cartographier
        '/detail/[i:pokemonId]',
        // Infos supplémentaires qui seront envoyées au controller
        // ici on stocke la méthode du controller qu'on va appeler
        // Mais aussi, le controller qui va être appelé
        [
            'method' => 'detail',
            'controller' => 'MainController'
        ],    
        // Nom de la route, c'est completement arbitraire
        'detail_by_name');


        $router->map(
            // la methode HTTP utilisée
            'GET',
            // quelle route on veut écouter/cartographier
            '/list/[i:Id]',
            // Infos supplémentaires qui seront envoyées au controller
            // ici on stocke la méthode du controller qu'on va appeler
            // Mais aussi, le controller qui va être appelé
            [
                'method' => 'list',
                'controller' => 'MainController'
            ],    
            // Nom de la route, c'est completement arbitraire
            'list');



        $router->map(
            // la methode HTTP utilisée
            'GET',
            // quelle route on veut écouter/cartographier
            '/types',
            // Infos supplémentaires qui seront envoyées au controller
            // ici on stocke la méthode du controller qu'on va appeler
            // Mais aussi, le controller qui va être appelé
            [
                'method' => 'typesButtonList',
                'controller' => 'MainController'
            ],    
            // Nom de la route, c'est completement arbitraire
            'types');
    



    
   // la fonction match detecte toute seule si une route
// précédement définie est actuelement utilisée dans le navigateur
// Ou, que j'essaie d'acceder à une URL définie.
$match = $router->match();


if ($match === false) {
    // on a pas trouvé de correspondance, on affiche une page 404 + code HTTP 404
    $mainController = new MainController();

    // Alternative, utiliser le nom complet de la classe :
    // $mainController = new Oshop\Controllers\MainController();
     $mainController->error404();
    exit;
}

// On récupère la cible de la route
$target = $match["target"];

// On récupère le nom de la méthode
$nomDeLaMethode = $target["method"];

// Je récupère le nom du controller à instancier
$nomDuController = "\\Pokemon\\Controllers\\" . $target["controller"];

// J'instancie mon controller
$controller = new $nomDuController();

// pour la page /catalog/product/8, $controller->product($match["params"])
$controller->$nomDeLaMethode($match["params"]); 