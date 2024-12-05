<?php 
Class Rider {
    private int $rider_id;
    private string $nombre_rider;


    /**
     * trae un Rider desde la base de datos a través del id
     * @param int $id para identificar al producto en la tabla principal
     * @return Rider Retorna un objeto Rider
     * 
     */
    public static function get_x_id(int $id): ?Rider
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM rider WHERE rider_id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch(); 

        return $result ?? null;
    }

            /**
     * Agrega un rider a la base de datos
     * @param string $nombre_rider

     */
    public static function insert_rider(string $nombre_rider)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT rider_id FROM rider WHERE nombre_rider = :nombre_rider";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre_rider' => $nombre_rider,
        ]);
        $rider = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        if($rider){
            return $rider['rider_id'];
        } else{
            $query = "INSERT INTO rider (nombre_rider) VALUES (:nombre_rider)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_rider'=>$nombre_rider]);
            return $conexion->lastInsertId();
        }
    }

    /**
     * Actualiza el nombre de un rider en la base de datos.
     * 
     * @param int $rider_id El ID del rider a actualizar.
     * @param string $nuevo_nombre El nuevo nombre del rider.
     */
    
     public function editar_rider(int $rider_id, string $nuevo_nombre)
     {
         $query = "UPDATE rider SET nombre_rider = :nuevo_nombre WHERE rider_id = :rider_id";
         $conexion = Conexion::getConexion();
         $PDOStatement = $conexion->prepare($query);
         $PDOStatement->execute([
             'rider_id' => $rider_id,
             'nuevo_nombre' => $nuevo_nombre,
         ]);
     }

         /**
     * Devuelve el útlimo id instertado o el id de un producto existente a través del rider, si es que lo encuentra. Caso contrario lo crea.
     * @param string $nombre_rider Es el nombre de la rider
     * 
     * @return int Un id de rider para identificar al producto en la tabla principal
     */
    public static function insertar_o_actualizar_rider($nombre_rider)
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT rider_id FROM rider WHERE nombre_rider = :nombre_rider";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_rider' => $nombre_rider]);
        $rider = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($rider) {
            return $rider['rider_id'];
        } else {
            $query = "INSERT INTO rider VALUES (NULL,:nombre_rider)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_rider' => $nombre_rider]);
            return $conexion->lastInsertId();
        }
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

            /**
     * Devuelve el catalogo completo
     * @return Rider[] Un array de objetos Rider
     */
    public static function CatalogoCompleto(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM rider";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_riders = $PDOStatement->fetchAll();

        return $lista_riders;
    }

            /**
     * Devuelve los datos de un Rider en particular
     * @param int $idRider el ID unico del Rider
     * 
     * @return ?Rider Devuelve un objeto Rider o null
     */
    public static function Busca_Rider(int $idRider): ?Rider
    {
        $catalogo = self::CatalogoCompleto();
        foreach ($catalogo as $rider) {
            if ($rider->rider_id == $idRider) {
                return $rider;
            }
        }
        return null;
    }

            /**
     * Borra un objeto Evento de la base de datos
     */
    public function borrar_rider()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM rider WHERE rider_id=?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            $this->rider_id
        ]);
    }
}

?>