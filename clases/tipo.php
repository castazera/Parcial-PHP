<?php 
class Tipo 
{
    private $tipo_id;
    private $nombre_tipo;


    /**
     * Obtiene los valores de la tabla Tipo
     * @return Tipo[] devuelve la colección del objeto Tipo
     */
    public static function Tipo_name(){
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT * FROM tipo ";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $nombre_tipo = $PDOStatement->fetchAll();
        return $nombre_tipo;
    }

    /**
     * Get the value of tipo_id
     */ 
    public function getTipo_id()
    {
        return $this->tipo_id;
    }

    /**
     * Set the value of tipo_id
     *
     * @return  self
     */ 
    public function setTipo_id($tipo_id)
    {
        $this->tipo_id = $tipo_id;

        return $this;
    }

    /**
     * Get the value of nombre_tipo
     */ 
    public function getNombre_tipo()
    {
        return $this->nombre_tipo;
    }

    /**
     * Set the value of nombre_tipo
     *
     * @return  self
     */ 
    public function setNombre_tipo($nombre_tipo)
    {
        $this->nombre_tipo = $nombre_tipo;

        return $this;
    }

        /**
     * trae un tipo desde la base de datos a través del id
     * @param int $id para identificar al producto en la Tipo principal
     * @return Tipo Retorna un objeto Tipo
     * 
     */
    public static function get_x_id(int $id): ?Tipo
    {

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tipo WHERE tipo_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }
}
?>