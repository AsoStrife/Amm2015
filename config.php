<?php
	define("DB_SERVER", 'localhost');
	define("DB_USER", 'root');
	define("DB_PASS", '');
	define("DB_NAME", 'ffstory_frasi');

	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	/*
	if (!isset($mysqli)) {
                $mysqli->close();            
        }
*/