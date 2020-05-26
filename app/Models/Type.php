<?php

namespace Pokemon\Models;
use \Pokemon\Utils\Database;

class Type {


    private $id;
    private $name;
    private $color;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    public function getAllFromType()
    {
        $sql = "
        SELECT * 
        FROM `type`";

          // Je recupere la connexion à la BDD
          $pdo = Database::getPDO();

          // J'execute la requete
          $statement = $pdo->query($sql);
  
          // Je recupère le resultat
          $typeInformation = $statement->fetchAll(\PDO::FETCH_CLASS, Type::class);
          
         // Je retourne l'objet qui contient toutes les données
        // récupérées depuis la base de données
        return $typeInformation;
    }


    // récupere les information de la table type par rapport a l'id pokemon utile pour les pastille dans le details

    public function getTypeByPokemon($numero)
    {
             $sql = "
        SELECT 
        `type`.*,
        `pokemon_type`.*
        FROM `type`
        INNER JOIN `pokemon_type` ON `type`.`id` = `pokemon_type`.`type_id`
        WHERE `pokemon_type`.`pokemon_numero` = {$numero}
        ";

        // Je recupere la connexion à la BDD
        $pdo = Database::getPDO();

        // J'execute la requete
        $statement = $pdo->query($sql);

        // Je recupère le resultat
        $pokemontype = $statement->fetchAll(\PDO::FETCH_CLASS, Type::class);
        
        // Je retourne l'objet qui contient toutes les données
        // récupérées depuis la base de données
        return $pokemontype;
    }

}