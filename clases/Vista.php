<?php 
class Vista
{
    /**
     * Valida el id de una vista y devuelve un array con los datos de la misma
     * @param ?string $vista El id de la vista o null
     * 
     * @return array Devuelve un array con el nombre de archivo y el titulo a mostrar
     */
    public static function ValidarVista(?string $vista): array{
        switch ($vista) {
            case null:
            case 'inicio':
                $archivo = $vista;
                $titulo = 'Bienvenido a Boards';
                $activa = true;
                $restringida = false;
                break;
            case 'catalogo_completo':
                $archivo = $vista;
                $titulo = 'Catalogo Completo';
                $activa = true;
                $restringida = false;
                break;
            case 'quienes_somos':
                $archivo = $vista;
                $titulo = 'About Us';
                $activa = true;
                $restringida = false;
                break;
            case 'categorias':
                $archivo = $vista;
                $titulo = 'Tablas';
                $activa = true;
                $restringida = false;
                break;
            case 'prod':
                $archivo = $vista;
                $titulo = 'Detalles del producto' ;
                $activa = true;
                $restringida = false;
                break;
            case 'OfertasDisponibles':
                $archivo = $vista;
                $titulo = 'Ofertas imperdibles';
                $activa = true;
                $restringida = false;
                break;
            default:
                $archivo = '404';
                $titulo = 'Página no encontrada';
                $activa = true;
                $restringida = false;
                break;
        }
        if(!$activa){
            $resultado =[
                'archivo' => 'noDisponible',
                'titulo' => 'Seccion no disponible',  
            ];
        }else if($restringida){
            $resultado =[
                'archivo' => '403',
                'titulo' => 'Seccion restringida',  
            ];  
        }else{
            $resultado = [
                'archivo' => $archivo,
                'titulo' => $titulo,
             ];
        }

        return $resultado;
    }
}

?>