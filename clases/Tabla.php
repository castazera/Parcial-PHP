<?php

class Tabla
{

    private int $id;
    private int $tipo_id;
    private Tipo $tipo;
    private int $modelo_id;
    private Modelo $modelo;
    private int $marca_id;
    private Marcas $marcas;
    private $publicacion;
    private float $precio;
    private string $talla;
    private string $color;
    private string $imagen_url;
    private string $descripcion;
    private string $material;
    private Array $eventos;
    private Rider $rider;

    private static $createValues = ['id','publicacion','precio', 'talla', 'color', 'imagen_url', 'descripcion','material'];

    /**
     * Devuelve una instancia del objeto Comic, con todos sus propiedades configurados
     * @return Tabla
     * 
     */

    private static function crearBoard($boardData): Tabla {
        $tabla = new self();

        foreach (self::$createValues as $value) {
            $tabla->{$value} = $boardData[$value];
        }

        $tabla->tipo = Tipo::get_x_id($boardData['tipo_id']);
        $tabla->modelo = Modelo::get_x_id($boardData['modelo_id']);
        $tabla->modelo_id = $boardData['modelo_id'];
        $tabla->marcas = Marcas::get_x_id($boardData['marca_id']);
        $tabla->marca_id = $boardData['marca_id']; 
        $tabla->tipo_id = $boardData['tipo_id'];

        $EventosId =
            !empty($boardData['eventos']) ?
            explode(",", $boardData['eventos']) : [];

        $eventos = [];

        foreach ($EventosId as $EventoId) {
            $eventos[] = Evento::get_x_id($EventoId);
        }

        $tabla->eventos = $eventos;

        return $tabla;
    }

    /**
     * Devuelve el catalogo completo
     * @return Tabla[] Un array de objetos Tabla
     */
    public static function CatalogoCompleto(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT tabla_1.*, GROUP_CONCAT(exb.evento_id) AS evento FROM tabla_1 LEFT JOIN evento_x_board AS exb ON tabla_1.id = exb.board_id GROUP BY tabla_1.id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
    
        $lista_boards = [];
    
        while ($resultado = $PDOStatement->fetch()) {
            $lista_boards[] = self::crearBoard($resultado);
        }
        // echo("<pre>");
        // echo("el resultadoooooooooooo");
        // echo($resultado);
        // echo("</pre>");
    
        return $lista_boards;
    }


    /**
     * Devuleve el modelo con talla, color y material de la tabla
     */
    public function nombre_tabla(): string
    {

        return $this->modelo_id . " de Talla " . $this->talla . " ,color " .  $this->color . " realizado con " . $this->material;
    }


    /**
     * Devuelve el catalogo de productos de un tipo de tabla en particular
     * @param string $TipoTabla un string con el nombre del tipo de tabla a buscar
     * 
     * @return Tabla[] Un array lleno de instancias del objeto Tabla.     
     */
    public static function catalogo_tabla(string $TipoTabla): array
    {
        $lista_boards = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1 JOIN tipo ON tabla_1.tipo_id = tipo.tipo_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $catalogo_tabla = $PDOStatement->fetchAll();
        foreach ($catalogo_tabla as $tabla) {
            if ($tabla->nombre_tipo == $TipoTabla) {
                $lista_boards[] = $tabla;
            }
        }
        return $lista_boards;
    }

    /**
     * Funcion que solo trae el tipo de tabla.
     */

    public static function tipo_tabla(): array
    {
        $lista_tipo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1 JOIN tipo ON tabla_1.tipo_id = tipo.tipo_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_tabla = $PDOStatement->fetchAll();



        foreach ($catalogo_tabla as $B) {
            $lista_tipo == $B->nombre_tipo;
        }


        return $lista_tipo;
    }


    /**
     * Devuelve el catalogo de modelos de tablas
     * 
     * @return Tabla[] Un array lleno de instancias del objeto Tabla.     
     */
    public static function Catalogo_Modelo(): array
    {
        $listaModelos = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1 JOIN modelo ON tabla_1.modelo_id = modelo.modelo_id";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_modelos = $PDOStatement->fetchAll();

        foreach ($catalogo_modelos as $modelo) {
            $listaModelos[] = $modelo->nombre_modelo;
        }

        return $listaModelos;
    }


    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto el ID unico del producto
     * 
     * @return ?Tabla Devuelve un objeto tabla o null
     */
    public static function Busca_Producto(int $idProducto): ?Tabla
    {
        $catalogo = self::CatalogoCompleto();
        foreach ($catalogo as $tabla) {
            if ($tabla->id == $idProducto) {
                return $tabla;
            }
        }
        return null;
    }


    /**
     * Devuelve todos los productos que tenga un precio menor o igual al colocado
     * @param int El precio que se utilizara para medir
     * Si no se provee un precio minimo, el minimo obligatorio sera 15.000
     * @return Tabla[] Un array lleno de instancias de objeto Tabla
     */
    public static function Busca_Precio(int $PrecioMin = 22000): array
    {

        $resultado = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $catalogo_tabla = $PDOStatement->fetchAll();

        foreach ($catalogo_tabla as $tabla) {

            if ($tabla->getPrecio() <= $PrecioMin) {
                $resultado[] = $tabla;
            }
        }
        return $resultado;
    }


    /**
     * Toma el texto "Descripcion" de nuestros productos y los recorta de manera igual
     * @param string $texto es el parrafo a recortar
     * @param int $cantidad esta seria la cantidad de palabras a recortar. Este valor es opcional, de no existir se recortaran 10 palabras
     * 
     * @return string La cantidad de palabras que dieron como resultado con un elipsis de (...) concatenando el final, en caso de que sea necesario. 
     */
    public function recortar_descripcion(int $cantidad = 10): string
    {

        $texto = $this->descripcion;
        if (strlen($texto) <= $cantidad) {
            return $texto;
        } else {
            $recortado = substr($texto, 0, $cantidad);
            $resultado = $recortado . "...";
            return $resultado;
        }
    }

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function precioUnidad(): string
    {
        return "$" . number_format($this->precio, 2, ',', '.');
    }

    /**
     * Devuelve las tablas en un determinado rango de precio colocado
     * @param int $minimo Es el precio minimo. De no darlo se asumira como 0
     * @param int $maximo Es el precio maximo. De no darlo se asumira como infinito
     * 
     * @return Tabla[] Un array de objetos Tabla
     */

    public function tabla_x_rango(int $minimo = 0, int $maximo = 0)
    {
        $conexion = Conexion::getConexion();
        if ($maximo) {
            $query = "SELECT * FROM tabla_1 WHERE precio BETWEEN :minimo AND :maximo;";
            $valores = [
                'minimo' => $minimo,
                'maximo' => $maximo
            ];
        } else {
            $query = "SELECT * FROM tabla_1 WHERE precio BETWEEN :minimo";
            $valores = [
                'minimo' => $minimo
            ];
        }
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute($valores);
        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }



    /**
     * Devuelve el útlimo id instertado o el id de un producto existente a través de la marca, si es que lo encuentra. Caso contrario lo crea.
     * @param string $nombre_marca Es el nombre de la marca
     * 
     * @return int Un id de marca para identificar al producto en la tabla principal
     */
    public static function insertar_o_actualizar_marca(string $nombre_marca)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT marcas_id FROM marcas WHERE marcas_nombre = :nombre_marca";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_marca' => $nombre_marca]);
        $marca = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($marca) {
            return $marca['marcas_id'];
        } else {
            $query = "INSERT INTO marcas (marcas_nombre) VALUES (:nombre_marca)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_marca' => $nombre_marca]);
            return $conexion->lastInsertId();
        }
    }
    /**
     * Devuelve el útlimo id instertado o el id de un producto existente a través del modelo, si es que lo encuentra. Caso contrario lo crea.
     * @param string $nombre_modelo Es el nombre de la modelo
     * 
     * @return int Un id de modelo para identificar al producto en la tabla principal
     */
    public static function insertar_o_actualizar_modelo($nombre_modelo)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "SELECT modelo_id FROM modelo WHERE nombre_modelo = :nombre_modelo";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_modelo' => $nombre_modelo]);
        $modelo = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($modelo) {
            return $modelo['modelo_id'];
        } else {
            $query = "INSERT INTO modelo (nombre_modelo) VALUES (:nombre_modelo)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_modelo' => $nombre_modelo]);
            return $conexion->lastInsertId();
        }
    }

    /**
     * Devuelve el útlimo id instertado o el id de un producto existente a través del tipo, si es que lo encuentra. Caso contrario lo crea.
     * @param string $nombre_tipo Es el nombre de la tipo
     * 
     * @return int Un id de tipo para identificar al producto en la tabla principal
     */
    public static function insertar_o_actualizar_tipo($nombre_tipo)
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT tipo_id FROM tipo WHERE nombre_tipo = :nombre_tipo";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_tipo' => $nombre_tipo]);
        $tipo = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($tipo) {
            return $tipo['tipo_id'];
        } else {
            $query = "INSERT INTO tipo (nombre_tipo) VALUES (:nombre_tipo)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre_tipo' => $nombre_tipo]);
            return $conexion->lastInsertId();
        }
    }


    /**
     * Agrega una tabla a la base de datos
     * @param string $imagen
     * @param string $modelo 
     * @param string $tipo
     * @param string $talle
     * @param string $color
     * @param string $material
     * @param string $descripcion
     * @param float $precio
     */
    public static function insert_tabla(int $tipo_id, int $marca_id, int $modelo_id, string $talla, string $publicacion, string $color, string $imagen_url, string $descripcion, string $material, float $precio)
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO tabla_1 (tipo_id, marca_id, modelo_id, talla, publicacion, color, imagen_url, descripcion, material, precio) VALUES (:tipo_id, :marca_id, :modelo_id, :talla, :publicacion, :color, :imagen_url, :descripcion, :material, :precio)";
    
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
        'tipo_id' => $tipo_id,
        'marca_id' => $marca_id,
        'modelo_id' => $modelo_id,
        'talla' => $talla,
        'publicacion' => $publicacion,
        'color' => $color,
        'imagen_url' => $imagen_url,
        'descripcion' => $descripcion,
        'material' => $material,
        'precio' => $precio,
    ]);
    
    return $conexion->lastInsertId();
}

    public static function add_eventos(int $board_id, int $evento_id){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO evento_x_board VALUES (NULL,:evento_id,:board_id)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'evento_id' => $evento_id,
            'board_id' => $board_id
        ]);
    }

    /**
     * Agrega un modelo a la base de datos
     * @param string $nombre_modelo para identificar al producto que se subirá a la tabla de modelo
     */
    public static function subir_modelo(string $nombre_modelo)
    {
        $OBJconexion = new conexion();
        $conexion = $OBJconexion->getConexion();
        $query = "INSERT INTO modelo (nombre_modelo) VALUES (:nombre_modelo)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'nombre_modelo' => $nombre_modelo,
            ]
        );
    }

    /**
     * trae un modelo desde la base de datos a través del id
     * @param int $id para identificar al producto en la tabla principal
     * @return Tabla Retorna un objeto Tabla
     * 
     */
    public static function get_x_id(int $id): ?Tabla
    {

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1 WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }
    /**
     * Borra un objeto tabla de la base de datos
     */
    public function borrar_tabla()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM tabla_1 WHERE id=?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            $this->id
        ]);
    }


    /**
     * Actualiza los datos de una tabla en la base de datos.
     * 
     * @param int $tipo_id id del tipo de tabla.
     * @param int $marca_id id de la marca de la tabla.
     * @param int $modelo_id id del modelo de la tabla.
     * @param string $talla La talla de la tabla.
     * @param string $publicacion La fecha de publicación de la tabla.
     * @param string $color El color de la tabla.
     * @param string $imagen_url La URL de la imagen de la tabla.
     * @param string $descripcion La descripción de la tabla.
     * @param string $material El material de la tabla.
     * @param float $precio El precio de la tabla.
     */

    public function editar_tabla(int $tipo_id, int  $marca_id, int  $modelo_id, string  $talla, string $publicacion, string $color, string $imagen_url, string $descripcion, string $material, $precio)
    {
        $query = "UPDATE tabla_1  
        SET tipo_id = :tipo_id, marca_id = :marca_id, modelo_id = :modelo_id, talla = :talla, publicacion = :publicacion, color = :color, imagen_url = :imagen_url, descripcion = :descripcion, material = :material, precio = :precio WHERE id = :id";
        Conexion::getConexion();
        $PDOStatement = Conexion::getConexion()->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
            'tipo_id' => $tipo_id,
            'marca_id' => $marca_id,
            'modelo_id' => $modelo_id,
            'talla' => $talla,
            'publicacion' => $publicacion,
            'color' => $color,
            'imagen_url' => $imagen_url,
            'descripcion' => $descripcion,
            'material' => $material,
            'precio' => $precio,
        ]);
    }

    
     /**
     * Vaciar lista de eventos
     */
    public function clear_eventos()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM evento_x_board WHERE board_id = :board_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'board_id' => $this->id
            ]
        );
    }

        /**
     * Devuelve un array compuesto por IDs de todos los eventos
     */
    public function getEventos_ids(): array
    {
        $result = [];
        foreach ($this->eventos as $evento) {
            $result[] = intval($evento->getEvento_id());
        }
        return $result;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Modelo
     */
    public function getModelo_id()
    {
        return $this->modelo_id;
    }

    /**
     * Set the value of Modelo
     *
     * @return  self
     */
    public function setModelo($modelo_id)
    {
        $this->modelo_id = $modelo_id;

        return $this;
    }

    /**
     * Get the value of Talla
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set the value of Talla
     *
     * @return  self
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get the value of Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of Color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of Material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set the value of Material
     *
     * @return  self
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get the value of Precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of Precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of Imagen
     */
    public function getImagen()
    {
        return $this->imagen_url;
    }

    /**
     * Set the value of Imagen
     *
     * @return  self
     */
    public function setImagen($imagen_url)
    {
        $this->imagen_url = $imagen_url;

        return $this;
    }

    /**
     * Get the value of Descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of Descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }



    /**
     * Get the value of Tipo
     */
    public function getTipo()
    {
        return $this->tipo_id;
    }

    /**
     * Set the value of Tipo
     *
     * @return  self
     */
    public function setTipo($tipo_id)
    {
        $this->tipo_id = $tipo_id;

        return $this;
    }


    /**
     * Get the value of marca_id
     */
    public function getMarca_id()
    {
        return $this->marca_id;
    }

    /**
     * Set the value of marca_id
     *
     * @return  self
     */
    public function setMarca_id($marca_id)
    {
        $this->marca_id = $marca_id;

        return $this;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Set the value of publicacion
     *
     * @return  self
     */
    public function setPublicacion($publicacion)
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    /**
     * Get the value of eventos
     */ 
    public function getEventos()
    {
        return $this->eventos;
    }

    /**
     * Set the value of eventos
     *
     * @return  self
     */ 
    public function setEventos($eventos)
    {
        $this->eventos = $eventos;

        return $this;
    }
}
