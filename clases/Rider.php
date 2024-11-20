<?php 
Class Rider {
    private int $rider_id;
    private string $nombre_rider;


    public static function get_x_id(int $id): ?Rider
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM rider WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch(); 

        return $result ?? null;
    }

    /**
     * Get the value of rider_id
     */ 
    public function getRider_id()
    {
        return $this->rider_id;
    }

    /**
     * Set the value of rider_id
     *
     * @return  self
     */ 
    public function setRider_id($rider_id)
    {
        $this->rider_id = $rider_id;

        return $this;
    }

    /**
     * Get the value of nombre_rider
     */ 
    public function getNombre_rider()
    {
        return $this->nombre_rider;
    }

    /**
     * Set the value of nombre_rider
     *
     * @return  self
     */ 
    public function setNombre_rider($nombre_rider)
    {
        $this->nombre_rider = $nombre_rider;

        return $this;
    }
}

?>