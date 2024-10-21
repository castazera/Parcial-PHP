<?PHP
    require_once "../clases/Usuario.php";
    require_once "../clases/Conexion.php";
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASS="";
    const DB_NAME="nombreBase";

    //PDO PHP DATA OBJECT Son objetos de data de php

    //Pdo tiene que tener un PDOStatement, y debe generarse con un query ya preparado.
    //El objeto PDO genera la conexión y el PDOStatement genera cada pedido con la query, cada statement genera una tabla resutlado.

    //DSN Data Source Name (Nombre del origen de datos)
    //Se arma con una constante con los datos de la conexión
    const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    
    try{
        $conexion = new PDO(DB_DSN,DB_USER,DB_PASS);
    } catch (Exception $e ){
        echo "Falló la conexión";
        echo "Se generó un error en el sgte archivo";
        $e->getFile();

        //echo "<pre>";
        //print_r($e);
        //echo "</pre>";
        die('<p>Acá mensajede error personalizado</p>');
    }
    $conexion = (new Conexion())->getConexion();
    $querySelectUsuarios = "SELECT * FROM usuarios";

    //Listo para ser ejecutado, según jorge es un arma cargada, todavía sin gatillar.
    $PDOStatement = $conexion->prepare($querySelectUsuarios);
    //Te trae los datos de manera de array asociativo.
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    //Te trae los datos de manera de array de clase de objeto.
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS,"Usuario");
    //El query se convierte en la tabla resultado. EL PDOStatement tiene los resultados, no las tablas en si.
    $PDOStatement->execute();
    //fetch trae el primer resultado y pasa al siguiente. Funciona como un foreach de los datos e la tabla resultado. Si no devuelve nada, fetch devolverá false. Por lo cual un bucle while es una buena opción para recorrer el fetch.
    $datos = $PDOStatement->fetch();
    while($datos = $PDOStatement->fetch()){
        echo "<pre>";
        print_r($datos);
        echo "</pre>";
    }
    //Otra manera más fácil de traer todos los datos en un array multidimensional
    $usuarios = $PDOStatement->fetchAll();
    foreach($usuarios as $value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }


?>