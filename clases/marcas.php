<?php 
class Marcas{
    private $marcas_id;
    private $marcas_nombre;


    /**
     * Obtiene los valores de la tabla marcas
     * @return Marcas[] devuelve la colección del objeto marca
     */
    public static function Marcas_name(){
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $marca = $PDOStatement->fetchAll();
        return $marca;
    }



        /**
     * trae un modelo desde la base de datos a través del id
     * @param int $id para identificar al producto en la Marcas principal
     * @return Marcas Retorna un objeto Marcas
     * 
     */
    public static function get_x_id(int $marcas_id): ?Marcas
    {

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas WHERE marcas_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$marcas_id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }

                /**
     * Agrega un marcas a la base de datos
     * @param string $nombre_marcas

     */
    public static function insert_marcas(string $marcas_nombre)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT marcas_id FROM marcas WHERE marcas_nombre = :marcas_nombre";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'marcas_nombre' => $marcas_nombre,
        ]);
        $marcas = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        if($marcas){
            return $marcas['marcas_id'];
        } else{
            $query = "INSERT INTO marcas (marcas_nombre) VALUES (:marcas_nombre)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
            ':marcas_nombre' => $marcas_nombre]);
            return $conexion->lastInsertId();
        }
    }

        /**
     * Actualiza el nombre de un marcas en la base de datos.
     * 
     * @param int $marcas_id El ID del marcas a actualizar.
     * @param string $nuevo_nombre El nuevo nombre del marcas.
     */
    
     public function editar_marcas(int $marcas_id, string $nuevo_nombre)
     {
         $query = "UPDATE marcas SET marcas_nombre = :nuevo_nombre WHERE marcas_id = :marcas_id";
         $conexion = Conexion::getConexion();
         $PDOStatement = $conexion->prepare($query);
         $PDOStatement->execute([
             'marcas_id' => $marcas_id,
             'nuevo_nombre' => $nuevo_nombre,
         ]);
     }

/**
 * Borra un objeto Marcas de la base de datos junto con sus registros dependientes
 */
/**
 * Borra un objeto Marcas de la base de datos junto con sus registros dependientes
 */
public function borrar_marcas()
{
    $conexion = Conexion::getConexion();
    
    $queryDeleteDependientes = "DELETE FROM tabla_1 WHERE marcas_id = ?";
    $PDOStatement = $conexion->prepare($queryDeleteDependientes);
    $PDOStatement->execute([$this->marcas_id]);

    $queryDeleteMarca = "DELETE FROM marcas WHERE marcas_id = ?";
    $PDOStatement = $conexion->prepare($queryDeleteMarca);
    $PDOStatement->execute([$this->marcas_id]);
}

                /**
     * Devuelve el catalogo completo
     * @return Marcas[] Un array de objetos Marcas
     */
    public static function CatalogoCompleto(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_marcas = $PDOStatement->fetchAll();

        return $lista_marcas;
    }

                /**
     * Devuelve los datos de un Marcas en particular
     * @param int $marcas_id el ID unico del Marcas
     * 
     * @return ?Marcas Devuelve un objeto Marcas o null
     */
    public static function Busca_Marcas(int $marcas_id): ?Marcas
    {
        $catalogo = self::CatalogoCompleto();
        foreach ($catalogo as $marcas) {
            if ($marcas->marcas_id == $marcas_id) {
                return $marcas;
            }
        }
        return null;
    }


    /**
     * Get the value of marcas_id
     */ 
    public function getMarcas_id()
    {
        return $this->marcas_id;
    }

    /**
     * Set the value of marcas_id
     *
     * @return  self
     */ 
    public function setMarcas_id($marcas_id)
    {
        $this->marcas_id = $marcas_id;

        return $this;
    }

    /**
     * Get the value of marcas_nombre
     */ 
    public function getMarcas_nombre()
    {
        return $this->marcas_nombre;
    }

    /**
     * Set the value of marcas_nombre
     *
     * @return  self
     */ 
    public function setMarcas_nombre($marcas_nombre)
    {
        $this->marcas_nombre = $marcas_nombre;

        return $this;
    }

}

?>