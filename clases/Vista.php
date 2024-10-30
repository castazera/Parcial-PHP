<?php 
class Vista
{
 private $id;
 private $nombre;
 private $titulo;
 private $activa;
 private $restringida;

    /**
     * Valida el id de una vista y devuelve un array con los datos de la misma
     * @param ?string $vista El id de la vista o null
     * 
     * @return array Devuelve un array con el nombre de archivo y el titulo a mostrar
     */
    public static function ValidarVista(?string $vista): array
    {

        $conexion = (new conexion())->getConexion();
        $query = "SELECT * FROM vista WHERE nombre = ?";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$vista]);
    
        $result = $PDOStatement->fetch();

    
        if($result){
            if($result->getActiva()){
                if($result->getRestringida()){
                    $resultado = [
                        'archivo' => '403',
                        'titulo' => 'Sección restringida'
                    ];
                }else{
                    $resultado = [
                        'archivo' => $result->getNombre(),
                        'titulo' => $result->getTitulo(),
                    ];
                }
            }else{
                $resultado = [
                    'archivo' => 'noDisponible',
                    'titulo' => 'Sección no disponible'
                ];
            }

        }else{
            $resultado = [
                'archivo' => '404',
                'titulo' => 'Pagina no encontrada',
            ];
        };


    //     switch ($vista) {
    //         case null:
                
    //         case 'inicio':
    //             $archivo = $vista;
    //             $titulo = 'Bienvenido a Boards';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'catalogo_completo':
    //             $archivo = $vista;
    //             $titulo = 'Catalogo Completo';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'quienes_somos':
    //             $archivo = $vista;
    //             $titulo = 'About Us';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'categorias':
    //             $archivo = $vista;
    //             $titulo = 'Tablas';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'prod':
    //             $archivo = $vista;
    //             $titulo = 'Detalles del producto' ;
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'OfertasDisponibles':
    //             $archivo = $vista;
    //             $titulo = 'Ofertas imperdibles';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'FormularioDeQuejas':
    //             $archivo = $vista;
    //             $titulo = 'Formulario de quejas';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'RespuestaForm':
    //             $archivo = $vista;
    //             $titulo = 'Respuesta del formulario';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'QuejaConfirmada':
    //             $archivo = $vista;
    //             $titulo = 'Confirmacion de la queja';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'datos_devs':
    //             $archivo = $vista;
    //             $titulo = 'Datos de developers';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         case 'dashboard':
    //             $archivo = $vista;
    //             $titulo = 'Panel de control';
    //             $activa = true;
    //             $restringida = false;
    //         break;

    //         default:
    //             $archivo = '404';
    //             $titulo = 'Página no encontrada';
    //             $activa = true;
    //             $restringida = false;
    //         break;
    //     }
    //     if(!$activa){
    //         $resultado =[
    //             'archivo' => 'noDisponible',
    //             'titulo' => 'Seccion no disponible',  
    //         ];
    //     }else if($restringida){
    //         $resultado =[
    //             'archivo' => '403',
    //             'titulo' => 'Seccion restringida',  
    //         ];  
    //     }else{
    //         $resultado = [
    //             'archivo' => $archivo,
    //             'titulo' => $titulo,
    //          ];
    //     }

        return $resultado;
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
  * Get the value of nombre
  */ 
 public function getNombre()
 {
  return $this->nombre;
 }

 /**
  * Set the value of nombre
  *
  * @return  self
  */ 
 public function setNombre($nombre)
 {
  $this->nombre = $nombre;

  return $this;
 }

 /**
  * Get the value of titulo
  */ 
 public function getTitulo()
 {
  return $this->titulo;
 }

 /**
  * Set the value of titulo
  *
  * @return  self
  */ 
 public function setTitulo($titulo)
 {
  $this->titulo = $titulo;

  return $this;
 }

 /**
  * Get the value of activa
  */ 
 public function getActiva()
 {
  return $this->activa;
 }

 /**
  * Set the value of activa
  *
  * @return  self
  */ 
 public function setActiva($activa)
 {
  $this->activa = $activa;

  return $this;
 }

 /**
  * Get the value of restringida
  */ 
 public function getRestringida()
 {
  return $this->restringida;
 }

 /**
  * Set the value of restringida
  *
  * @return  self
  */ 
 public function setRestringida($restringida)
 {
  $this->restringida = $restringida;

  return $this;
 }
}

?>