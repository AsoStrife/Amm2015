<div class="lateral-menu">

    <?php if($_SESSION['logged'] == true): ?>
	    <h1 class="h1m30">Bentornato: <?=$_SESSION['username'];?></h1>
	    <h2>Grado: <?=$_SESSION['level'];?></h2>
	        
        <?php if($_SESSION['level'] == "admin"): ?>
	        <p> Totale Frasi: <?=getFrasiCount();?></p>
	        <p> Totale Utenti: <?=getUtentiCount();?> </p>
	        <p> Totale Eroi <?=getEroiCount();?>: </p>
	        <p> Totale Capitoli: <?=getCapitoliCount();?> </p>

	        <p>
	        	<ul>
	        		<li id="delete"> <a href="#">Cancella tutte le frasi </a> </li>
	        	</ul>
                (Per ripristinare le frasi controllare la pagina di informazioni progetto)
	        </p>

            <div class"" id="mex"></div>

    	<?php endif;?>

    	<ul>
           <li><a href='logout.php'><span>Logout</span></a></li>
        </ul>
	<?php else: ?>
	        <ul>
	           <li><a href='login.php'><span>Login</span></a></li>
	        </ul>
	<?php endif; ?>
</div>

<script type="text/javascript">
    $(document).ready
    (
        function()
        {
            $('li[id="delete"]').click
            (
                function()
                {
                    $.ajax
                    (
                        {
                            type: 'POST',
                            url:  'inc/function.php',
                            data: {
                                "d": true
                                },
                            
                            //data: {'idCapitolo': $('select[id="chapters"]').val()},
                            success: function(data) { 
                                console.debug('Chiamata eliminaFrasi avvenuta correttamente'); 
                                $('#mex').addClass("success");
                                $('#mex').html("Frasi e tabella cancellati correttamente"); 

                            },
                            error:  function(data) { console.debug('Errore nella chiamata eliminaFrasi');} 
                        }

                    );
                }
            );
        }
    );

</script>