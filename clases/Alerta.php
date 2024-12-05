<?php 
class Alerta {

    /**
     * Registra una alerta en el sistema, guardandola en la sesion
     * @param string $tipo el tipo de alerta danger/warning/success 
     * @param string $mensaje El contenido de la alerta
     */
    public static function registrarAlerta(string $tipo, string $mensaje) {
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
} 

    /**
     * Vacia la lista de alertas
     */
    public static function limpiarAlertas(){
        $_SESSION['alertas'] = [];

    }

    /**
     * Devuleve todas las alertas acumuladas en el sistema y vacia la lista
     * @param string
     */

    public static function obtenerAlertas(){
        if(!empty($_SESSION['alertas'])){
            $alertasActuales = "";
            foreach($_SESSION['alertas'] as $alerta){
                $alertasActuales .= self::print_alerta($alerta);
            }
            self::limpiarAlertas();
            return $alertasActuales;
        }else{
            return null;
        }

    }



    private static function print_alerta($alerta): string{
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .=  "</div>";

        return $html;
       

    }
}

?>