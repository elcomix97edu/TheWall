<html> 
<body> 

<form method="POST" action="addwall.php"> 
<strong>Ingresar mensaje:</strong> <input type="text" name="T1" size="20"><br><br> 
<input type="submit" value="Agregar" name="valor"> 
</form> 
<iframe id="request" hidden>
<iframe src="wall.php" height="40%" width="95%" align="middle"></iframe>
</iframe>
<div id="response"></div>






</body> 
</html>


<?php
require_once 'login.php';
$obj_conexion = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if(!$obj_conexion)
{
   echo "<script>alert('Cabeza no encaraste un queso');</script>";
}
else
{
   // echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}

$query = "SELECT * FROM mensaje ORDER BY id DESC";
$resultado = mysqli_query($obj_conexion,$query);
if (!$resultado) die("El acceso a la base de datos ha fallado: " . mysqli_error());


while($row = mysqli_fetch_assoc($resultado)) {
   $valor = $row['valor'];
   $fecha = $row['fecha']; 
   
   
   echo $valor ." ". $fecha."<br>";
}
?> 