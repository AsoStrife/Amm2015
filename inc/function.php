
<?php	
define("DB_SERVER", "localhost"); 
/*
 * Server locale
  **
define("DB_USER", "root"); 
define("DB_PASS", ""); 
define("DB_NAME", "ffstory_frasi"); 

/*
 * Server remoto
  */
define("DB_USER", "corrigaAndrea"); 
define("DB_PASS", "fringuello5140"); 
define("DB_NAME", "amm15_corrigaAndrea"); 
/**/

	function updateCapitoli(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
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

		$mysqli->close();

		return $capitoli;
	}

	if (isset($_POST['idC'])) 
        echo updateHeroes($_POST['idC']);
  
	function updateHeroes($id){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		$res 	= $mysqli->query
		(
			'
				SELECT
					*
				FROM
					app_frs_eroi
				WHERE
					IdCapitoli = ' . mysqli_real_escape_string($mysqli, $id). '
			'
		);

		$heroes = '';

		if($res->num_rows == 0)
			return '<option value="-1"> --Nessun dato presente-- </option>';

		while ($row = mysqli_fetch_assoc($res))
		{
			$heroes .= '<option value="' . $row['IdEroe'] . '">' . $row['NomeEroe'] . '</option>' . "\r\n";
		}
		//$mysqli->close();
		return $heroes;
	}

	if (isset($_POST['idF'])) 
        echo updateFrasi($_POST['idF']);

	function updateFrasi($id){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		if($id == null)
			return "<tr> <td> Nessun risultato trovato </td> </tr>";

		$res 	= $mysqli->query
		(
			'
				SELECT
					*
				FROM
					app_frs_frase
				WHERE
					IdEroe = ' . mysqli_real_escape_string($mysqli, $id) . '
			'
		);

		$quotes = '';

		if(!$res)
			return '<tr> <td> Non è presente nessuna frase </td> </tr>';

		while ($row = mysqli_fetch_assoc($res))
		{
			$quotes .=
			'
				<tr>
					<td>' . $row['Frase'] . '</td>
				</tr>
			';
		}
		$mysqli->close();
		return $quotes;

	}

	function getFrasiCount(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$r 	= $mysqli->query("select * from app_frs_frase");
		$mysqli->close();
		return $r->num_rows;
	}
	function getEroiCount(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$r 	= $mysqli->query("select * from app_frs_eroi");
		$mysqli->close();
		return $r->num_rows;
	}
	function getCapitoliCount(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$r 	= $mysqli->query("select * from app_frs_capitoli");
		$mysqli->close();
		return $r->num_rows;
	}
	function getUtentiCount(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$r 	= $mysqli->query("select * from app_users");
		$mysqli->close();
		return $r->num_rows;
	}


	if (isset($_POST['d'])) 
        eliminaFrasi();
    /*
     * Funzione che cancella tutte le frasi e la tabella app_frs_frase in una transazione 
     */
	function eliminaFrasi(){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		/*
		 * Inizio la transazione
		 */
		$mysqli->autocommit(false);	

		$mysqli->query("DELETE FROM app_frs_frase");
		//Se non riesco a distruggere anche la tabella torno indietro
		if(!$mysqli->query("DROP TABLE app_frs_frase"))
			$mysqli->rollback();

		$mysqli->commit();
		$mysqli->autocommit(true); 
		/*
		 * Fine transazione
		 */
		$mysqli->close();
	}
?>