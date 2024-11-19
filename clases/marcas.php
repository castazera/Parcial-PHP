<?php 
class Marcas{
    private $marcas_id;
    private $nombre_marcas;


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
     * Get the value of nombre_marcas
     */ 
    public function getNombre_marcas()
    {
        return $this->nombre_marcas;
    }

    /**
     * Set the value of nombre_marcas
     *
     * @return  self
     */ 
    public function setNombre_marcas($nombre_marcas)
    {
        $this->nombre_marcas = $nombre_marcas;

        return $this;
    }

    public static function get_x_id(int $marcas_id): ?Marcas
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas WHERE marcas_id = $marcas_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch(); 
   
        return $result ?? null;
    }
}

?>