<?php
	$mysqli = new mysqli('localhost', 'root', '', 'ffstory_frasi');
		$res 	= $mysqli->query
	(
		'
			SELECT
				*
			FROM
				app_frs_eroi
			WHERE
				IdCapitoli = ' . mysqli_real_escape_string($mysqli, $_POST['idCapitolo']) . '
		'
	);
	
	$heroes = '';
	
	while ($row = mysqli_fetch_assoc($res))
	{
		$heroes .= '<option value="' . $row['IdEroe'] . '">' . $row['NomeEroe'] . '</option>' . "\r\n";
	}
	
	echo $heroes;
?>