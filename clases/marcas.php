<?php 
class Marcas{
    private $marcas_id;
    private $marcas_nombre;
    
    public static function Marcas_name(){
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $nombre_marca = $PDOStatement->fetchAll();
        return $nombre_marca;
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