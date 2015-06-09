<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pacco
 *
 * @author amm
 */
class Pacco {
    private $altezza;
    private $larghezza;
    private $profondita;
    private $peso;
    private static $MAXDIM = 50;
    private static $MAXPESO = 15;
    
    
    public function getAltezza() {
        return $this->altezza;
    }

   
    public function setAltezza($v) {
        $val = $this->checkDimensione($v, self::$MAXDIM);
        if($val > -1){
            $this->altezza = $val;
            return true;
        }else{
            return false;
        }
    }
    
    public function getLarghezza() {
        return $this->altezza;
    }

   
    public function setLarghezza($v) {
        $val = $this->checkDimensione($v,self::$MAXDIM);
        if($val > -1){
            $this->larghezza = $val;
            return true;
        }else{
            return false;
        }
    }
    
    public function getProfondita() {
        return $this->profondita;
    }

   
    public function setProfondita($v) {
        $val = $this->checkDimensione($v, self::$MAXDIM);
        if($val > -1){
            $this->profondita = $val;
            return true;
        }else{
            return false;
        }
    }
    
    public function getPeso() {
        return $this->peso;
    }

   
    public function setPeso($v) {
        $val = $this->checkDimensione($v, self::$MAXPESO);
        if($val > -1){
            $this->peso = $val;
            return true;
        }else{
            return false;
        }
    }
    
    
    private function checkDimensione($v, $max){
        $intVal = filter_var($v, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (isset($intVal) && $intVal <= $max) {
            return $intVal;
            
        }
        return -1;
    }
}
