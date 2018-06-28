<html> 
<body bgcolor="green"> 

<form method="POST" action="addwall.php"> 
<center><strong>Ingresar mensaje:</strong>  <input type="text" name="T1" size="60"> <input type="checkbox" name="html" value="html"> <strong>Html</strong><br><br> 
  
<input type="submit" value="Agregar" name="valor"></center> 
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
   // echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
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
   
   
   echo "<center><font color=pink>". $valor ." &nbsp; &nbsp; ". $fecha."<br></font></center>";
}
?> 