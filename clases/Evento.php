<?php 
Class Evento {
    private int $evento_id;
    private string $nombre_evento;

    public static function get_x_id(int $id): ?Evento
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM evento WHERE evento_id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch(); 

        return $result ?? null;
    }

        /**
     * Devuelve el catalogo completo
     * @return Evento[] Un array de objetos Evento
     */
    public static function CatalogoCompleto(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM evento";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_eventos = $PDOStatement->fetchAll();

        return $lista_eventos;
    }

        /**
     * Devuelve los datos de un Evento en particular
     * @param int $idEvento el ID unico del Evento
     * 
     * @return ?Evento Devuelve un objeto Evento o null
     */
    public static function Busca_Evento(int $idEvento): ?Evento
    {
        $catalogo = self::CatalogoCompleto();
        foreach ($catalogo as $evento) {
            if ($evento->evento_id == $idEvento) {
                return $evento;
            }
        }
        return null;
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

        /**
     * Agrega un evento a la base de datos
     * @param string $nombre_evento

     */
    public static function insert_evento(string $nombre_evento)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT evento_id FROM evento WHERE nombre_evento = :nombre_evento";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre_evento' => $nombre_evento,
        ]);
        $evento = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        if($evento){
            return $evento['evento_id'];
        } else{
            $query = "INSERT INTO evento (nombre_evento) VALUES (:nombre_evento)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_evento'=>$nombre_evento]);
            return $conexion->lastInsertId();
        }
    }

    public function editar_evento(int $evento_id, string $nombre_evento){
        $query = "UPDATE evento  
        SET nombre_evento = :nombre_evento 
        WHERE evento_id = :evento_id";
        $PDOStatement = Conexion::getConexion()->prepare($query);
        $PDOStatement->execute([
            'evento_id' => $evento_id,
            'nombre_evento' => $nombre_evento
        ]);
    }

        /**
     * Borra un objeto Evento de la base de datos
     */
    public function borrar_evento()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM evento WHERE evento_id=?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            $this->evento_id
        ]);
    }
}

?>