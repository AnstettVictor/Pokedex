<?php

namespace Pokemon\Controllers;
use \Pokemon\Models\Pokemon;
use Pokemon\Models\Type;

class MainController extends CoreController {


/**
* Cette methode permet d'afficher la home.
* Elle va charger le bon template
* 
* @param  array $params
* @return void
*/
public function home($params = []) {
    
    $pokemonModel = new Pokemon();
    $findAllFromPokemon =  $pokemonModel->findAllFromPokemon();

    $this->show('home', 
    [ 
        "findAllFromPokemon" => $findAllFromPokemon
    ]);
}




/**
* Cette methode permet d'afficher la page detail/l'id du pokemon.
* Elle va charger le bon template
* 
* @param  array $params
* @return void
*/
public function detail($params) {

    $pokemonModel = new Pokemon();
    $findAllFromPokemonByNumero =  $pokemonModel->findAllFromPokemonByNumero($params);
    
    $typeModel = new Type();
    $getTypeByPokemon   = $typeModel->getTypeByPokemon($params['pokemonId']);
    $this->show('detail',
    [ 
        "findAllFromPokemonByNumero" => $findAllFromPokemonByNumero,
        "getTypeByPokemon" => $getTypeByPokemon
    ]
);
}



/**
 * Cette méthode va afficher le template, la vue, des characteres.
 * 
 * @param array $param
*/ 

    // action
    // déclencher une erreur 404
    public function error404() {
        // donner un code HTTP choisi
        http_response_code(404);
        $this->show('404');

        // ne pas aller plus loin, car il reste du code à executer sur index.php après le déclenchement de cette méthode
        exit();
    }


    /**
* Cette methode permet d'afficher une liste de pokemon une fois le type choisi.
* Elle va charger le bon template
* 
* @param  array $params
* @return void
*/
public function list($params = []) {
    $pokemonModel = new Pokemon();
    $findAllFromPokemonByType =  $pokemonModel->findAllFromPokemonByType($params);
 

    $this->show('list', 
    [ 
        "findAllFromPokemonByType" => $findAllFromPokemonByType
    ]);
}


   /**
* Cette methode permet d'afficher la page de selection du type
* Elle va charger le bon template
* 
* @param  array $params
* @return void
*/
public function typesButtonList($params = []) {
    
    $typesButton = new Type();
    $findAllForTypesButton=  $typesButton->getAllFromType();

   
    $this->show('types', 
    [ 
        "findAllForTypesButton" => $findAllForTypesButton,
       
    ]);
}
}

