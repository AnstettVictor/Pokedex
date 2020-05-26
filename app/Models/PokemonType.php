<?php

namespace Pokemon\Models;
use \Pokemon\Utils\Database;
class PokemonType { 

    
    private $pokemon_numero;
    private $type_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pokemon_numero
     */ 
    public function getPokemon_numero()
    {
        return $this->pokemon_numero;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }
}