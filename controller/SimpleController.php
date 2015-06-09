<?php

include_once './model/Frase.php';
include_once './model/Pacco.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author amm
 */
class SimpleController {

    //put your code here

    public function handleInput(&$request) {
        $vd = new ViewDescriptor();

        if (!isset($request["cmd"])) {
            $request["cmd"] = "none";
        }

       /*
        switch ($request["cmd"]) {
            case "pacco":
                if (isset($_SESSION['destinatario'])) {
                    $destinatario = $_SESSION['destinatario'];
                } else {
                    $destinatario = new Destinatario();
                }

                if (isset($_SESSION['pacco'])) {
                    $pacco = $_SESSION['pacco'];
                } else {
                    $pacco = new Pacco();
                }
                $this->salvaPacco($request, $vd, $pacco);
                break;


            case "destinatario":
                if (isset($_SESSION['destinatario'])) {
                    $destinatario = $_SESSION['destinatario'];
                } else {
                    $destinatario = new Destinatario();
                }
                $this->salvaDestinatario($request, $vd, $destinatario);
                break;

            default:
                $destinatario = new Destinatario();
                if (isset($_SESSION['destinatario'])) {
                    $destinatario = $_SESSION['destinatario'];
                }
                $this->mostraFormDestinatario( $vd);
                break;
        }
        */

        // richiamo la vista
        require 'view/master.php';
    }


    private function salvaDestinatario(&$request, $vd, $destinatario) {
        $nome = isset($request['nome']) ? $request['nome'] : null;
        $cognome = isset($request['cognome']) ? $request['cognome'] : null;
        $via = isset($request['via']) ? $request['via'] : null;
        $civico = isset($request['civico']) ? $request['civico'] : null;
        $cap = isset($request['cap']) ? $request['cap'] : null;
        $citta = isset($request['citta']) ? $request['citta'] : null;

        $messaggio = '<ul>';
        $errori = 0;




        if (!$destinatario->setNome($nome)) {
            $messaggio .= '<li>Specificare il nome del destinatario</li>';
            $errori++;
        }

        if (!$destinatario->setCognome($cognome)) {
            $messaggio .= '<li>Specificare il cognome del destinatario</li>';
            $errori++;
        }
        if (!$destinatario->setVia($via)) {
            $messaggio .= '<li>Specificare la via del destinatario</li>';
            $errori++;
        }

        if (!$destinatario->setNumeroCivico($civico)) {
            $messaggio .= '<li>Specificare un numero civico valido</li>';
            $errori++;
        }

        if (!$destinatario->setCitta($citta)) {
            $messaggio .= '<li>Specificare la citt&agrave; del destinatario</li>';
            $errori++;
        }
        if (!$destinatario->setCap($cap)) {
            $messaggio .= '<li>Specificare un CAP valido</li>';
            $errori++;
        }

        $messaggio .= '</ul>';

        $_SESSION['destinatario'] = $destinatario;


        if ($errori > 0) {
            $vd->setMessaggioErrore($messaggio);
            $this->mostraFormDestinatario($vd);
        }else{
            $this->mostraFormPacco($vd);
        }
        
    }

    private function salvaPacco(&$request, $vd, $pacco) {
        $peso = isset($request['peso']) ? $request['peso'] : null;
        $larghezza = isset($request['larghezza']) ? $request['larghezza'] : null;
        $altezza = isset($request['altezza']) ? $request['altezza'] : null;
        $profondita = isset($request['profondita']) ? $request['profondita'] : null;




        $messaggio = '<ul>';
        $errori = 0;

        if (!$pacco->setPeso($peso)) {
            $messaggio .= '<li>Specificare un peso minore di 15 kg</li>';
            $errori++;
        }

        if (!$pacco->setLarghezza($larghezza)) {
            $messaggio .= '<li>Specificare una larghezza inferiore ai 50 cm</li>';
            $errori++;
        }

        if (!$pacco->setAltezza($altezza)) {
            $messaggio .= '<li>Specificare una altezza inferiore ai 50 cm</li>';
            $errori++;
        }

        if (!$pacco->setProfondita($profondita)) {
            $messaggio .= '<li>Specificare una profondita inferiore ai 50 cm</li>';
            $errori++;
        }

        $_SESSION['pacco'] = $pacco;
        $messaggio .= '</ul>';


        if ($errori > 0) {
            $vd->setMessaggioErrore($messaggio);
            $this->mostraFormPacco($vd);
        }else{
            $this->mostraRiassunto($vd);
        }
        
    }
    
    private function mostraFormDestinatario($vd){
        $vd->setTitolo("MVC - Test ");
        $vd->setMenuFile('view/menu.php');
        $vd->setLogoFile('view/logo.php');
        $vd->setLeftBarFile('view/leftBar.php');
        $vd->setRightBarFile('view/rightBar.php');
        $vd->setContentFile('view/contentDestinatario.php');
    }
    
    private function mostraFormPacco($vd){
        $vd->setTitolo("MVC - Test ");
        $vd->setMenuFile('view/menu.php');
        $vd->setLogoFile('view/logo.php');
        $vd->setLeftBarFile('view/leftBar.php');
        $vd->setRightBarFile('view/rightBar.php');
        $vd->setContentFile('view/contentDimensioni.php');
    }
    
    private function mostraRiassunto($vd){
        $vd->setTitolo("MVC - Test ");
        $vd->setMenuFile('view/menu.php');
        $vd->setLogoFile('view/logo.php');
        $vd->setLeftBarFile('view/leftBar.php');
        $vd->setRightBarFile('view/rightBar.php');
        $vd->setContentFile('view/contentRiassunto.php');
    }

}
