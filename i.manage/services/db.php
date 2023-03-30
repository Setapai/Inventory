<?php
// CALL DATABASE
function database()
{
	global $con;
	try
	{
		$db_host = 'localhost';
		$db_name = 'imanage';
		$db_user = 'root';
		$user_pw = '';

		$con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec('SET CHARACTER SET utf8');

	}
	catch (PDOException $err)
	{
		echo 'You are currently denied access. Contact Administrator';
		$err->getMessage().'<br/>';
		file_put_contents('PDOErrors.txt', $err, FILE_APPEND);
		die();
	}
}

 ?>
