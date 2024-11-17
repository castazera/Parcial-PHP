<?php 

class Tabla{

    private $id;
    private $tipo_id;
    private $modelo_id;
    private $marca_id;
    private $publicacion;
    private $precio;
    private $talla;
    private $color;
    private $imagen_url;
    private $descripcion;
    private $material;
    private $stock;
    private $unidadesVendidas;

    /**
     * Devuelve el catalogo completo
     * @return Tabla[] Un array de objetos Tabla
     */
    public static function CatalogoCompleto():array{
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_boards = $PDOStatement->fetchAll();

        return $lista_boards;


        //          echo "<pre>";
        // echo print_r($lista_boards);
        // echo "</pre>";

        

        // $catalogo = [];
            
        // $datosJson = file_get_contents("datos/catalogo.json");
        // $JsonData = json_decode($datosJson);
        // foreach($JsonData as $value){
        //     foreach($value as $key){
                
        //     $tabla = new self();

        //     $tabla -> id = $key -> id;
        //     $tabla -> tipo = $key -> tipo;
        //     $tabla -> modelo= $key -> modelo ; 
        //     $tabla -> precio= $key -> precio;
        //     $tabla -> talla=  $key -> talla;
        //     $tabla -> color = $key -> color;
        //     $tabla -> imagen= $key -> imagen;
        //     $tabla -> descripcion= $key -> descripcion;
        //     $tabla -> material= $key -> material;
        //     $tabla -> stock= $key -> stock;
        //     $tabla -> unidadesVendidas= $key -> unidadesVendidas;
            
        //     $catalogo[] = $tabla;    
        //     }}

    }


    /**
     * Devuleve el modelo con talla, color y material de la tabla
     */
    public function nombre_tabla():string{

        return $this->modelo_id . " de Talla " . $this->talla . " ,color " .  $this->color . " realizado con " . $this->material;
    }

    /**
     * Devuleve unidades restantes de stock
     */
    public function unidades_restantes():int{
        return $this->stock - $this->unidadesVendidas;
    }

    /**
     * Devuleve unidades restantes de stock
     */
    public function porcentajeStock():int{
        return ($this->unidades_restantes() / $this->stock) * 100;
    }

    /**
     * Devuelve el catalogo de productos de un tipo de tabla en particular
     * @param string $TipoTabla un string con el nombre del tipo de tabla a buscar
     * 
     * @return Tabla[] Un array lleno de instancias del objeto Tabla.     
     */
    public static function catalogo_tabla(string $TipoTabla): array{
        $lista_boards = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tabla_1 JOIN tipo ON tabla_1.tipo_id = tipo.tipo_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_tabla = $PDOStatement->fetchAll();

        // echo "<pre>";
        // echo print_r($catalogo_tabla);
        // echo "</pre>";

        foreach($catalogo_tabla as $tabla){
        //       echo "<pre>";
        // echo print_r($tabla->nombre_tipo);
        // echo "</pre>";

            


            if($tabla->nombre_tipo == $TipoTabla){
                $lista_boards[] = $tabla;
        //                 echo "<pre>";
        // echo print_r($tabla);
        // echo "</pre>";
            }
            // if($tabla->tipo == $TipoTabla){
            //     $resultado[] = $tabla;
            // }
        }
        return $lista_boards;
 // NO ENTENDI LO DE LOS HOLDERS EN SQL MINUTO 1:15HS.
    }

/**
 * Funcion que solo trae el tipo de tabla.
 */

 public static function tipo_tabla(): array{
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
    public static function Catalogo_Modelo():array{
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
    public static function Busca_Producto(int $idProducto): ?Tabla{
        $catalogo = self::CatalogoCompleto();
        foreach($catalogo as $tabla){
            if($tabla->id == $idProducto){
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
public static function Busca_Precio(int $PrecioMin = 25000): array{

    $resultado = [];
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM tabla_1";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();
    $catalogo_tabla = $PDOStatement->fetchAll();

    // echo "<pre>";
    // echo print_r($catalogo_tabla);
    // echo "</pre>";

    foreach($catalogo_tabla as $tabla){

        if ($tabla->getPrecio() <= $PrecioMin) {
            $resultado[] = $tabla;
        }

        // if($tabla->precio <= $PrecioMin){
        //      $resultado[] = $tabla;
        // }else{
        //     echo "<pre>";
        //     echo print_r("no entra pa");
        //     echo "</pre>";
        // }
    }
    return $resultado;
}

// /**
//  * Toma el catalogo completo y filtra solo los modelos para colocarnos en el select del form. 
//  * @return Tabla[] de objetos tabla
//  */
// public static function Busca_modelo(): array{
//     $resultado = [];
// }


    /**
 * Toma el texto "Descripcion" de nuestros productos y los recorta de manera igual
 * @param string $texto es el parrafo a recortar
 * @param int $cantidad esta seria la cantidad de palabras a recortar. Este valor es opcional, de no existir se recortaran 10 palabras
 * 
 * @return string La cantidad de palabras que dieron como resultado con un elipsis de (...) concatenando el final, en caso de que sea necesario. 
 */
    public function recortar_descripcion( int $cantidad = 10 ):string{

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
    public function precioUnidad(): string{
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
        if($maximo){
            $query = "SELECT * FROM tabla_1 WHERE precio BETWEEN :minimo AND :maximo;";
            $valores = [
                'minimo' => $minimo,
                'maximo' => $maximo                    
            ];
        }else{
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
 * Agrega una tabla a la base de datos
 *  * @param string $imagen
 * @param string $modelo 
 * @param string $tipo
 * @param string $talle
 * @param string $color
 * @param string $material
 * @param string $descripcion
 * @param float $precio
 */

 public static function insertar_o_actualizar_marca($nombre_marca) {
    $OBJconexion = new conexion();
    $conexion = $OBJconexion->getConexion();

    // Verificar si la marca ya existe
    $query = "SELECT marcas_id FROM marcas WHERE marcas_nombre = :nombre_marca";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['nombre_marca' => $nombre_marca]);
    $marca = $PDOStatement->fetch(PDO::FETCH_ASSOC);

    if ($marca) {
        // Si existe, devolver el ID
        return $marca['marcas_id'];
    } else {
        // Si no existe, insertar nueva marca
        $query = "INSERT INTO marcas (marcas_nombre) VALUES (:nombre_marca)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_marca' => $nombre_marca]);
        return $conexion->lastInsertId(); // Retornar el nuevo ID
    }
}

public static function insertar_o_actualizar_modelo($nombre_modelo) {
    $OBJconexion = new conexion();
    $conexion = $OBJconexion->getConexion();

    // Verificar si el modelo ya existe
    $query = "SELECT modelo_id FROM modelo WHERE nombre_modelo = :nombre_modelo";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['nombre_modelo' => $nombre_modelo]);
    $modelo = $PDOStatement->fetch(PDO::FETCH_ASSOC);

    if ($modelo) {
        // Si existe, devolver el ID
        return $modelo['modelo_id'];
    } else {
        // Si no existe, insertar nuevo modelo
        $query = "INSERT INTO modelo (nombre_modelo) VALUES (:nombre_modelo)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_modelo' => $nombre_modelo]);
        return $conexion->lastInsertId(); // Retornar el nuevo ID
    }
}
public static function insertar_o_actualizar_tipo($nombre_tipo) {
    $OBJconexion = new conexion();
    $conexion = $OBJconexion->getConexion();

    // Verificar si el modelo ya existe
    $query = "SELECT tipo_id FROM tipo WHERE nombre_tipo = :nombre_tipo";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['nombre_tipo' => $nombre_tipo]);
    $modelo = $PDOStatement->fetch(PDO::FETCH_ASSOC);

    if ($modelo) {
        // Si existe, devolver el ID
        return $modelo['tipo_id'];
    } else {
        // Si no existe, insertar nuevo modelo
        $query = "INSERT INTO tipo (nombre_tipo) VALUES (:nombre_tipo)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre_tipo' => $nombre_tipo]);
        return $conexion->lastInsertId(); // Retornar el nuevo ID
    }
}



public static function insert_tabla(int $tipo_id, int  $marca_id, int  $modelo_id, string  $talla, string $publicacion, string $color, string $imagen_url, string $descripcion, string $material, float $precio) {
    $OBJconexion = new conexion();
    $conexion = $OBJconexion->getConexion();
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
}
 public static function subir_modelo(string $nombre_modelo){
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
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of unidadesVendidas
     */ 
    public function getUnidadesVendidas()
    {
        return $this->unidadesVendidas;
    }

    /**
     * Set the value of unidadesVendidas
     *
     * @return  self
     */ 
    public function setUnidadesVendidas($unidadesVendidas)
    {
        $this->unidadesVendidas = $unidadesVendidas;

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
}