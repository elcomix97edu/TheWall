<?php
require_once 'login.php';
$obj_conexion = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if(!$obj_conexion)
{
    //echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{
    //echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}
date_default_timezone_set('UTC -03:00');
$fechahoy = "". date('Y')."-".date('m')."-".date('d')." ".date("H").":".date("i").":".date("s");
$valor2 = $_POST['T1'];
$link = $_POST['html'];
//echo "(border)".$valor."(border)";
//echo $fechahoy;
//echo $valor2;

function removeHTML($str)
{
	$temp =  "";
	for($i = 0; $i <= strlen($str) - 1; $i += 1)
	{
		switch($str[$i])
		{
			case '<':
			{
				$temp = $temp . "&lt;";
				break;
			}
			case '>':
			{
				$temp = $temp . "&gt;";
				break;
			}
			case '&':
			{
				$temp = $temp . "&amp";
				continue;
			}
			default:
			{
				$temp = $temp . substr($str, $i, 1);
			}
		}
	}
	return $temp;
}

if ($link =="html"){
	
	$valor = " <a href=".$valor2.">$valor2</a> ";
	echo $valor;
	
}else {
	$valor = $valor2;
	}

 if ($valor =="" || trim($valor) =="") {
	 echo "No esta permitido agregar mensajes sin texto";
	 
 } else  {
	 $valor = removeHTML($valor);
	 $valor_seguro = mysqli_real_escape_string($obj_conexion, $valor);
	 $query = "INSERT INTO `mensaje` (`id`, `valor`, `fecha`) VALUES (NULL, '$valor_seguro', '$fechahoy')"; 
	 $resultado = mysqli_query($obj_conexion,$query);
	 if (!$resultado) die("El acceso a la base de datos ha fallado: " . mysqli_error());
	 echo "Mensaje agregado correctamente, por favor vuelva a la pagina anterior";
	 header("Location: index.php");
	 die();
	 
 }


?> 

