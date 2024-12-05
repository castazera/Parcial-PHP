<?php 
class Autenticacion{
    /**
     * Verifica las credenciales del usuario, y de ser correcto, guarda los datos de la sesion
     * @param string $username el nombre de usuario provisto
     * @param string $password la contraseña provista
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no lo sea y null en caso de que el usuario no se encuentren en la db
     */
    public static function log_in(string $usuario, string $password){
        $datosUsuario = Usuarios::usuario_x_username($usuario);

        // echo "<pre>";
        // print_r($datosUsuario);
        // echo "</pre>";

        if($datosUsuario){
            if(password_verify($password, $datosUsuario->getPassword())){
               
                $datosLogin['username'] = $datosUsuario->getUser();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                echo "<p>El password es correcto</p>";

                return $datosLogin['rol'];
                
            }else{
                  
                Alerta::registrarAlerta('danger', 'El password ingresado no es correcto');
            
                return FALSE;
            }
        }else{
            Alerta::registrarAlerta('warning', 'El usuario ingresado no se encontró en la base de datos');
            return NULL;
        }
    }

    /**
     * Log Out
     */
    public static function log_out(){
        if(isset($_SESSION['loggedIn'])){
            unset($_SESSION['loggedIn']);
        };
    }

    public static function verify($nivel = 0): bool
    {
        if (!$nivel) {
            // Acceso público
            return TRUE;
        }
    
        if (isset($_SESSION['loggedIn'])) {
            // Nivel 1 o más
            if ($nivel > 1) {
                if ($_SESSION['loggedIn']['rol'] == "admin" || $_SESSION['loggedIn']['rol'] == "superadmin") {
                    return TRUE; 
                    
                } else {
                    Alerta::registrarAlerta('danger', 'No tiene permisos para ingresar aquí');
                    header('location: views/iniciarSesion.php');
                    exit; 
                }
            } else {
                // Rebote
                $routeMod = $nivel > 1 ? "/admin" : "";
                header("location: {$routeMod}index.php?sec=iniciarSesion");
                exit; 
            }
        }

        header('location: index.php?sec=iniciarSesion');
        exit; 
        return FALSE; 
}

}

?>