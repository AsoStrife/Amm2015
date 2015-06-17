
<?php	
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

		while ($row = mysqli_fetch_assoc($res))
		{
			$heroes .= '<option value="' . $row['IdEroe'] . '">' . $row['NomeEroe'] . '</option>' . "\r\n";
		}
		$mysqli->close();
		return $heroes;
	}

	if (isset($_POST['idF'])) 
        echo updateFrasi($_POST['idF']);

	function updateFrasi($id){
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

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
?>