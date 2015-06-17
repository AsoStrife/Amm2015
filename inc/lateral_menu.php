<div class="lateral-menu">

    <?php if($_SESSION['logged'] == true): ?>
	    <h1 class="h1m30">Bentornato: <?=$_SESSION['username'];?></h1>
	    <h2>Grado: <?=$_SESSION['level'];?></h2>
	        
        <?php if($_SESSION['level'] == "admin"): ?>
	        <p> Totale Frasi: <?=getFrasiCount();?></p>
	        <p> Totale Utenti: <?=getUtentiCount();?> </p>
	        <p> Totale Erori <?=getEroiCount();?>: </p>
	        <p> Totale Capitoli: <?=getCapitoliCount();?> </p>
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
