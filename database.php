<html>
	<body>
<?php
echo "conectando a database";
//$mysqli = mysqli_connect("192.168.1.122", "user1", "contrasena", "pokemon1");
$mysqli = mysqli_connect("172.17.0.2", "root", "pass", "pokemondb");
echo "conectado a database";
if (!$mysqli) {
	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	exit;
    }
    
    echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($mysqli) . PHP_EOL;
$orderfield = $_GET['orderfield'];
$sql = 'SELECT * from pokemon order by '.$orderfield.' desc';
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else{
	    echo "query ok";
	    // iterate over all rows
	    while ($row = mysqli_fetch_assoc($result)) {
	        // iterate over all columns
	        foreach ($row as $col) {
	            echo $col . " ";
	        }
	        echo "<br>";
	    } 
}


    mysqli_close($mysqli);
?>

</body>
</html>