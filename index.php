<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exemplo em PHP</title>
</head>
<body>
<?php
ini_set("display_errors", 1);
header('Content-Type: text/html');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "192.168.1.178";
$username = "root";
$password = "docker_passwd";
$database = "meubanco";

// Criando conexão
$link = new mysqli($servername, $username, $password, $database);

/* checar conexão */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

$query = "INSERT INTO dados (
	produtoID,
	codigo_produto,
	nome_produto,
	descricao,
	fabricante
	) VALUES (
		'$valor_rand1',
		'$valor_rand2',
		'$valor_rand2',
		'$valor_rand2',
		'$valor_rand2',
		'$host_name'
		)";

if ($link->query($query) === true) {
  echo "Informação salva com sucesso!";
} else {
  echo "Error: " . $link->error;
}

?>
</body>
</html>
