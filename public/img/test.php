<?php
$directorio = opendir("productos");

while ($archivo = readdir($directorio)) {
	$ext = substr($archivo, strlen($archivo) -3);
	if ($ext === 'jpg') {
		echo $archivo;
		var_dump(unlink($archivo));
		echo '<br>';
	}
}
