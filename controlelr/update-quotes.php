<?php
	$mysqli = new mysqli('localhost', 'root', '', 'ffstory_frasi');

	$res 	= $mysqli->query
	(
		'
			SELECT
				*
			FROM
				app_frs_frase
			WHERE
				IdEroe = ' . mysqli_real_escape_string($mysqli, $_POST['idEroe']) . '
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
	
	echo $quotes;
?>