<? 
    session_start();

    if(isset($_SESSION['logged']) == false)
        header("Location: login.php");

    //include('config.php');
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