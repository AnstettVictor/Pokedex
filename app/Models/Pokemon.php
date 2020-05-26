<?php

namespace Pokemon\Models;

use \Pokemon\Utils\Database;

class Pokemon
{

    private $id;
    private $nom;
    private $pv;
    private $attaque;
    private $defense;
    private $attaque_spe;
    private $defense_spe;
    private $vitesse;
    private $numero;







    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of pv
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Get the value of attaque
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Get the value of defense
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Get the value of attaque_spe
     */
    public function getAttaque_spe()
    {
        return $this->attaque_spe;
    }

    /**
     * Get the value of defense_spe
     */
    public function getDefense_spe()
    {
        return $this->defense_spe;
    }

    /**
     * Get the value of vitesse
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Cette fonction va me renvoyer tout de la table pokemon via une requete sql
     * 
     * @return Pokemon[]
     */
    public function findAllFromPokemon()

    {
        $sql = "
        SELECT * FROM `pokemon`";

        // Je recupere la connexion à la BDD
        $pdo = Database::getPDO();

        // J'execute la requete
        $statement = $pdo->query($sql);

        // on précise à fetchAll le format des résultats
        $pokemon = $statement->fetchAll(\PDO::FETCH_CLASS, Pokemon::class);


        return $pokemon;
    }



    /**
     * Cette fonction va me renvoyer tout de la table pokemon  ou le numero est = a l'id du pokemeon  envoyer via une requete sql
     * 
     * @return Pokemon[]
     */
    public function findAllFromPokemonByNumero($params)

    {
        $sql = "
        SELECT * FROM `pokemon` WHERE `numero` = {$params['pokemonId']} 
        ";

        // Je recupere la connexion à la BDD
        $pdo = Database::getPDO();

        // J'execute la requete
        $statement = $pdo->query($sql);

        // on précise à fetchAll le format des résultats
        $pokemon = $statement->fetchObject(Pokemon::class);



        return $pokemon;
    }


    /**
     * Cette fonction va me renvoyer tout de la table pokemon Seulement la ou le le numero du type correspond grace a une requetes sql sur un table intermediaire
     * 
     * @return Pokemon[]
     */
    public function findAllFromPokemonByType($numero)

    {

        $sql = "
        SELECT 
        `pokemon`.*,
        `pokemon_type`.*
        FROM `pokemon`
        INNER JOIN `pokemon_type` ON `pokemon`.`numero` = `pokemon_type`.`pokemon_numero`
        WHERE `pokemon_type`.`type_id` = {$numero['Id']}
        ";

        // Je recupere la connexion à la BDD
        $pdo = Database::getPDO();

        // J'execute la requete
        $statement = $pdo->query($sql);

        // Je recupère le resultat
        $pokemontype = $statement->fetchAll(\PDO::FETCH_CLASS, Pokemon::class);

        // Je retourne l'objet qui contient toutes les données
        // récupérées depuis la base de données
        return $pokemontype;
    }
}
