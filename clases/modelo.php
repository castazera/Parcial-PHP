<?php 
class Modelo{
    private $modelo_id;
    private $nombre_modelo;
 
    /**
     * Obtiene los valores de la tabla modelo
     * @return Modelo[] devuelve la colección del objeto modelo
     */
    public static function Modelo_name(){
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT * FROM modelo ";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $nombre_modelo = $PDOStatement->fetchAll();
        return $nombre_modelo;
    }

    /**
     * Get the value of modelo_id
     */ 
    public function getModelo_id()
    {
        return $this->modelo_id;
    }

    /**
     * Set the value of modelo_id
     *
     * @return  self
     */ 
    public function setModelo_id($modelo_id)
    {
        $this->modelo_id = $modelo_id;

        return $this;
    }

    /**
     * Get the value of nombre_modelo
     */ 
    public function getNombre_modelo()
    {
        return $this->nombre_modelo;
    }

    /**
     * Set the value of nombre_modelo
     *
     * @return  self
     */ 
    public function setNombre_modelo($nombre_modelo)
    {
        $this->nombre_modelo = $nombre_modelo;

        return $this;
    }
}

?>