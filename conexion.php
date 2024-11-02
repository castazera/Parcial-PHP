<?php 
require_once "clases/tipo.php";
require_once "clases/Conexion.php";
// try {
//     $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
// } catch (Exception $e) {
//     echo "Fallo la conexion a nuestra DB";

//     echo "<p> Entonctramos un problema accediendo a los datos. Estamos trabajando para solucionarlo. Por favor, intente mas tarde</p>";

//     echo "<p> Se genero un error en el siguiente archivo</p>" . $e->getFile();

//     echo "<p> El error esta en la siguiente linea: </p>" . $e->getLine();

//     die("<p>Hubo un error al intentar realizar la conexion</p>");
// }
$conexion = Conexion::getConexion();

$query = "SELECT * FROM tipo";

$PDOStatement = $conexion->prepare($query);
// $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
$PDOStatement->setFetchMode(PDO::FETCH_CLASS, "tipo");
$PDOStatement->execute();

/*while($datos = $PDOStatement->fetch()){
    echo "<pre>";
    echo print_r($datos);
    echo "</pre>";
}*/

?>

<!-- 
PDO: PHP data object. 
DSN: Data source name (nombre del origen de datos
 mysql: host = [local]

fetch() trae el primer resultado y pasa el cursos el siguiente, si lo ejectuamos varias veces, podemos pasar uno a uno por cada elemento

Una vez que se acaben los resultados, la funcion fetch, retornara false, y por lo tanto, podemos usar un loop while.

-->