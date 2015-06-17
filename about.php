<?  session_start();
    include ('inc/head.php'); 
    include('inc/function.php');
?>
<body> 
<? include ('inc/top_menu.php'); ?>

    <div class="white-c" id="big-content">
		<? include('inc/lateral_menu.php'); ?>
        
		<div class="main-content">
        	<h1>Informazioni sul progetto</h1>
            <p> Questo progetto sfrutta un database da me creato diversi anni fa, con l'intenzione di creare una raccolta di citazioni dei diversi Final Fantasy. </p>
            <p> Il progetto funziona in questo modo: per poter svolgere delle ricerche bisogna autenticarsi (la home page stessa sarà inacessibile senza login). <br> Una volta
                effettuata l'autenticazione si potrà  scegliere un capitolo dal menu a tendina. Una volta selezionato un capitolo, l'evento .change scatenerà una chiamata ajax che agiornerà 
                il menu a tendina seguente con l'elenco degli eroi. Una volta selezionato anche l'eroe, si potrà premere il pulsante cerca che effettuerà un altra chiamata ajax stampando tutte
                le citazioni disponibili. </p>
            <p> Requisiti soddisfatti: 
                <ul>
                    <li>Utilizzo di HTML e CSS</li>
                    <li>Utilizzo di PHP e MySQL</li>
                    <li>Almeno due ruoli (amministratore ed user)</li>
                    <li>Almeno una funzionalità ajax (leggere la descrizione del progetto)</li>
                </ul>
            </p>

            <p> L'amministratore a differenza dell'utente semplice può vedere le statistiche nel menù laterale del progetto. </p>
         </div>            
    </div>

<a href="#" class="scrollup">Torna su!</a>

</body>
</html>
