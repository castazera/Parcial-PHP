<?php 
Class Evento {
    private int $evento_id;
    private string $nombre_evento;

    public static function get_x_id(int $id): ?Evento
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM evento WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch(); 

        return $result ?? null;
    }

    /**
     * Get the value of evento_id
     */ 
    public function getEvento_id()
    {
        return $this->evento_id;
    }

    /**
     * Set the value of evento_id
     *
     * @return  self
     */ 
    public function setEvento_id($evento_id)
    {
        $this->evento_id = $evento_id;

        return $this;
    }

    /**
     * Get the value of nombre_evento
     */ 
    public function getNombre_evento()
    {
        return $this->nombre_evento;
    }

    /**
     * Set the value of nombre_evento
     *
     * @return  self
     */ 
    public function setNombre_evento($nombre_evento)
    {
        $this->nombre_evento = $nombre_evento;

        return $this;
    }
}

?>