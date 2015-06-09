<?php
/**
 * © 2015 
 * 
 * @author      Corriga Andrea 
 * @version     1.0.0
 *
**/
//error_reporting (0); 
//ini_set('display_error', '0');

FrontController::dispatch($_REQUEST);

class FrontController {
    /**
     * Gestore delle richieste al punto unico di accesso all'applicazione
     * @param array $request i parametri della richiesta
     */
    public static function dispatch(&$request) {
        // inizializzo sessione 
        session_start();

        if(!isset($config)){
		    if(file_exists('config.php')){
		        include ('config.php');
		    }
		}
	

        if (isset($request["page"])) {
            switch ($request["page"]) {
                case "home":
                    // la pagina di login e' accessibile a tutti,
                    // la facciamo gestire al BaseController
                    //$controller = new BaseController();
                    //$controller->handleInput($request);
                	echo 'ok';
                    break;
                
                default:
                    self::write404();
                    break;
            }
        } else {
            header('Location: ./home');
        }
    }
    /**
     * Crea una pagina di errore quando il path specificato non esiste
     */
    public static function write404() {
        // impostiamo il codice della risposta http a 404 (file not found)
        header('HTTP/1.0 404 Not Found');
        $titolo = "File non trovato!";
        $messaggio = "La pagina che hai richiesto non &egrave; disponibile";
        //include_once('error.php');
        exit();
    }
 
}