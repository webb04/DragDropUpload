<?php

// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'user');
DEFINE ('DB_PASSWORD', 'pass');
DEFINE ('DB_HOST', 'localhost:3000');
DEFINE ('DB_NAME', 'dbname');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
