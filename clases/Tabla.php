<?php 
class Tabla{

    private $id;
    private $tipo;
    private $modelo;
    private $precio;
    private $talla;
    private $color;
    private $imagen;
    private $descripcion;
    private $material;


    /**
     * Devuelve el catalogo completo
     * @return Tabla[] Un array de objetos Tabla
     */
    public static function CatalogoCompleto():array{

        $catalogo = [];
            
        $datosJson = file_get_contents("datos/catalogo.json");
        $JsonData = json_decode($datosJson);
        foreach($JsonData as $value){
            foreach($value as $key){
                
            $tabla = new self();

            $tabla -> id = $key -> id;
            $tabla -> tipo = $key -> tipo;
            $tabla -> modelo= $key -> modelo ; 
            $tabla -> precio= $key -> precio;
            $tabla -> talla=  $key -> talla;
            $tabla -> color = $key -> color;
            $tabla -> imagen= $key -> imagen;
            $tabla -> descripcion= $key -> descripcion;
            $tabla -> material= $key -> material;
            
            $catalogo[] = $tabla;    
            }}

        return $catalogo;
    }


    /**
     * Devuleve el modelo con talla, color y material de la tabla
     */
    public function nombre_tabla():string{

        return $this->modelo . " de Talla " . $this->talla . " ,color " .  $this->color . " realizado con " . $this->material;
    }

    /**
     * Devuelve el catalogo de productos de un tipo de tabla en particular
     * @param string $TipoTabla un string con el nombre del tipo de tabla a buscar
     * 
     * @return Tabla[] Un array lleno de instancias del objeto Tabla.     
     */
    public static function catalogo_tabla(string $TipoTabla): array{
        $resultado = [];
        $catalogo = self::CatalogoCompleto();
        foreach($catalogo as $tabla){
            if($tabla->tipo == $TipoTabla){
                $resultado[] = $tabla;
            }
        }



        return $resultado;
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
public static function Busca_Precio(int $PrecioMin = 15000): array{

    $resultado = [];
    
    $catalogo = self::CatalogoCompleto();

    foreach($catalogo as $tabla){
        if($tabla->precio <= $PrecioMin){
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
    public function recortar_descripcion( int $cantidad = 10 ):string{

    $texto = $this->descripcion;    
    $seleccionDePalabras = explode(" ", $texto);
    
    if(count($seleccionDePalabras) <= 10){
        return $texto;
    }else{
        $recortado = array_slice($seleccionDePalabras,0,$cantidad);
        $resultado = implode(" ", $recortado) . "...";
        return $resultado;
    }}

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function PrecioUnidad(): string{
        return "$" . number_format($this->precio, 2, ',', '.');
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
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of Modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

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
        return $this->imagen;
    }

    /**
     * Set the value of Imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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
        return $this->tipo;
    }

    /**
     * Set the value of Tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}