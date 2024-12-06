<?php 
class Conexion
{
    private const DB_SERVER = "localhost";
    private const DB_NAME = "board";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charsetn=utf8mb4";

    private static ?PDO $db = null;


    /**
     * Metodo que prepara una conexion para ser utilizada
     * @return PDO
     */
    public static function conectar()
    {
        try {
           self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die("Error al conectarse al SQL");
        }
    }

    /**
     * Metodo que devuelve una conexion PDO lista para usar
     * @return PDO
     */

     public static function getConexion():PDO{
        try{
            if(self::$db==null){
                self::conectar();
            }
        } catch(Exception $e){
            die("Error al conecxtar sql");
        }
        return self::$db;
    }
}
?>