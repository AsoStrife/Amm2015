<? 
$res 	= $mysqli->query
(
	'
		SELECT
			*
		FROM
			app_frs_capitoli
		ORDER BY
			app_frs_capitoli.ordine ASC
	'
);

$capitoli = array();

while ($row = mysqli_fetch_assoc($res))
{
	$capitoli[] = $row;
}

include ('inc/head.php'); 

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
                                        url:  './view/inc/update-heroes.php',
                                        data: {'idCapitolo': $('select[id="chapters"]').val()},
                                        success: function(data, textStatus, jqXHR) { console.debug(data); $('select[id="heroes"]').html(data); }
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
                                        url:  './view/inc/update-quotes.php',
                                        data: {'idEroe': $('select[id="heroes"]').val()},
                                        success: function(data, textStatus, jqXHR) { $('table[id="quotes"]').html(data) }
                                    }
                                );
                            }
                        );
                    }
                );
            </script>
            </form>
            <p><small>Versione 2.0</small></p>   
            
        </div>            
    </div>

<a href="#" class="scrollup">Torna su!</a>

</body>
</html>
