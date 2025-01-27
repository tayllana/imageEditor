<?php
// Informações de conexão com o banco de dados


function conexao()
{
    $hostname = 'mysql48-farm2.uni5.net';
    $username = 'agenciaset14';
    $password = 'v3nut1349aM';
    $database = 'agenciaset14';
	$con = mysqlI_connect($hostname, $username, $password, $database);

	if (!$con) {
		die('Nao conseguiu conectar: ' .  mysqli_error($con) . ': ' . mysqli_error($con));
	}

	$charset = @mysqli_set_charset($con, 'utf8');
	if (!$charset) {
		die('Nao conseguiu setar a codificação: ' .  mysqli_error($con) . ': ' . mysqli_error($con));
	}
	return $con;
}
?>
