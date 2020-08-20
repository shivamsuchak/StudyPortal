<?php 
	try{
		$pdo = new pdo("mysql:host=localhost:3306;dbname=studyportal","root","" );
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
    	die("ERROR: Could not connect. " . $e->getMessage());
}
?>
