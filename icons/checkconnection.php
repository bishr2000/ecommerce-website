<?php

	$MYSQLi = new MYSQLi("localhost", "root", "", "shopping");
	if($MYSQLi->errno){
		printf("Unable to connect to the database: </br> %s", $MYSQLi->error);
		exit();
	}else{
		printf("Successfully connected to the database, and shopping is open");
	}
?>