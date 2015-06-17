<<<<<<< HEAD
<? 
    session_start();

    if(isset($_SESSION['logged']) == false)
        header("Location: login.php");

    include('config.php');
    include('inc/function.php');
    include ('inc/head.php'); 
    $capitoli = updateCapitoli();
?>
<body> 
<? include ('inc/top_menu.php'); ?>

    <div class="white-c" id="big-content">
		<? include('inc/lateral_menu.php'); ?>
        
   		<div class="main-content">
			<h1>Le frasi più belle di Final Fantasy</h1>
            <form style="margin:20px 0 20px 0;">
            <select id="chapters">
                <?php foreach($capitoli as $capitolo) : ?>
                    <option value="<?php echo $capitolo['IdCapitolo']; ?>"><?php echo $capitolo['NomeCapitolo']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <select id="heroes"></select>
            
            <input type="button" name="filter" id="filter" value="Cerca" class="btn"/>
            
            <br clear="all" />

			<table id="quotes" class="table table-striped">
			</table>
			<script type="text/javascript">
                $(document).ready
                (
                    function()
                    {
                        $('select[id="chapters"]').change
                        (
                            function()
                            {
                                $.ajax
                                (
                                    {
                                        type: 'POST',
                                        url:  'inc/function.php',
                                        data: {
                                            "idC": $('select[id="chapters"]').val()
                                            },
                                        
                                        //data: {'idCapitolo': $('select[id="chapters"]').val()},
                                        success: function(data) { console.debug('Chiamata updateHeroes avvenuta correttamente'); $('select[id="heroes"]').html(data); },
                                        error:  function(data) { console.debug('Errore nella chiamata updateHeroes');} 
                                    }

                                );
                            }
                        );
                        
                        $('input[id="filter"]').click
                        (
                            function()
                            {
                                $.ajax
                                (
                                    {
                                        type: 'POST',
                                        url:  'inc/function.php',
                                        data: {
                                            "idF": $('select[id="heroes"]').val()
                                            },
                                        
                                        //data: {'idCapitolo': $('select[id="chapters"]').val()},
                                        success: function(data) { console.debug('Chiamata updateFrasi avvenuta correttamente'); $('table[id="quotes"]').html(data); },
                                        error:  function(data) { console.debug('Errore nella chiamata updateFrasi');} 
                                    }
                                );
                            }
                        );
                    }
                );
            </script>
            </form>
            
        </div>            
    </div>

</body>
</html>
=======
<?php
include_once './view/ViewDescriptor.php';
include_once './controller/SimpleController.php';


date_default_timezone_set("Europe/Rome");
// punto unico di accesso all'applicazione
FrontController::dispatch($_REQUEST);

/**
 * Classe che controlla il punto unico di accesso all'applicazione
 * @author Davide Spano
 */
class FrontController {

    /**
     * Gestore delle richieste al punto unico di accesso all'applicazione
     * @param array $request i parametri della richiesta
     */
    public static function dispatch(&$request) {
        // inizializziamo la sessione 
        session_start();
        if (isset($request["page"])) {

            switch ($request["page"]) {
                case "home":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "about":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
           default:
                    self::write404();
                    break;
            }
        } else {
            self::write404();
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
        include_once('error.php');
        exit();
    }

    /**
     * Crea una pagina di errore quando l'utente non ha i privilegi 
     * per accedere alla pagina
     */
    public static function write403() {
        // impostiamo il codice della risposta http a 404 (file not found)
        header('HTTP/1.0 403 Forbidden');
        $titolo = "Accesso negato";
        $messaggio = "Non hai i diritti per accedere a questa pagina";
        $login = true;
        include_once('error.php');
        exit();
    }
    
}


    

>>>>>>> origin/master
