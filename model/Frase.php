<?php

class Frase {
    private $id;
    private $frase;
    private $idErore;
    
     /**
     * Restituisce il nome dell'utente
     * @return string
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Restituisce il cognome dell'utente
     * @return string
     */
    public function getFrase() {
        return $this->frase;
    }

    
    /**
     * Restituisce la via di abitazione dell'utente
     * @return string
     */
    public function getidErore() {
        return $this->idErore;
    }
   
}
